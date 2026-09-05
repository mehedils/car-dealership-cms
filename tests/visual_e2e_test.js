import puppeteer from '/home/mehedi/.bun/install/global/node_modules/puppeteer';
import fs from 'fs';
import path from 'path';

const TEST_SCREENSHOTS_DIR = path.resolve('docs/screenshots/visual_tests');
if (!fs.existsSync(TEST_SCREENSHOTS_DIR)) {
    fs.mkdirSync(TEST_SCREENSHOTS_DIR, { recursive: true });
}

const BASE_URL = 'http://127.0.0.1:8000';

async function runVisualTests() {
    console.log('====================================================');
    console.log('🚀 STARTING COMPREHENSIVE AUTOMATED VISUAL TEST FROM 0');
    console.log('Target URL:', BASE_URL);
    console.log('====================================================\n');

    const browser = await puppeteer.launch({
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox', '--window-size=1440,900']
    });

    const page = await browser.newPage();
    await page.setViewport({ width: 1440, height: 900 });

    const results = [];

    // Helper function to test a page
    async function testUrl(name, urlPath, requiredSelector, isPostAuth = false) {
        const fullUrl = BASE_URL + urlPath;
        const pageErrors = [];
        const networkFailures = [];

        const onConsole = msg => {
            if (msg.type() === 'error') {
                pageErrors.push(msg.text());
            }
        };
        const onPageError = err => {
            pageErrors.push(err.message);
        };
        const onRequestFailed = req => {
            // Ignore optional external analytics / third-party fonts if blocked
            const url = req.url();
            if (url.includes('127.0.0.1') || url.includes('localhost')) {
                networkFailures.push(`${req.method()} ${url} - ${req.failure()?.errorText || 'Failed'}`);
            }
        };

        page.on('console', onConsole);
        page.on('pageerror', onPageError);
        page.on('requestfailed', onRequestFailed);

        let statusCode = null;
        let loadTime = null;
        let selectorFound = false;

        const startTime = Date.now();
        try {
            const response = await page.goto(fullUrl, { waitUntil: 'networkidle0', timeout: 20000 });
            loadTime = Date.now() - startTime;
            statusCode = response ? response.status() : 'No Response';

            if (requiredSelector) {
                const el = await page.$(requiredSelector);
                selectorFound = !!el;
            } else {
                selectorFound = true;
            }

            // Save visual verification snapshot
            const filename = `${name.replace(/[^a-zA-Z0-9]/g, '_').toLowerCase()}.png`;
            await page.screenshot({ path: path.join(TEST_SCREENSHOTS_DIR, filename) });

        } catch (err) {
            pageErrors.push(err.message);
        } finally {
            page.off('console', onConsole);
            page.off('pageerror', onPageError);
            page.off('requestfailed', onRequestFailed);
        }

        const passed = (statusCode === 200) && selectorFound && (pageErrors.length === 0) && (networkFailures.length === 0);

        const testResult = {
            name,
            urlPath,
            statusCode,
            loadTimeMs: loadTime,
            selectorFound,
            errorsCount: pageErrors.length,
            networkFailuresCount: networkFailures.length,
            pageErrors,
            networkFailures,
            passed
        };

        results.push(testResult);

        const statusIcon = passed ? '✅ PASS' : '❌ FAIL';
        console.log(`${statusIcon} [${statusCode}] ${name} (${loadTime}ms) - Selector: ${selectorFound ? 'FOUND' : 'MISSING'}`);
        if (pageErrors.length > 0) {
            console.log('   ⚠️  Console Errors:', pageErrors);
        }
        if (networkFailures.length > 0) {
            console.log('   ⚠️  Network Failures:', networkFailures);
        }

        return testResult;
    }

    // 1. PUBLIC FRONTEND TESTS
    console.log('--- 1. Testing Public Frontend Routes ---');
    await testUrl('Frontend: Homepage', '/', 'header.header');
    await testUrl('Frontend: Inventory (/cars)', '/cars', '#mainSearchForm');
    await testUrl('Frontend: Services (/services)', '/services', '.card-spot');
    await testUrl('Frontend: About Us (/about)', '/about', '.page-header');
    await testUrl('Frontend: Contact Us (/contact)', '/contact', '.card-contact');

    // Test a specific car detail page
    // First, let's grab the first car link from /cars
    let firstCarSlug = null;
    try {
        await page.goto(BASE_URL + '/cars', { waitUntil: 'networkidle0' });
        const carLink = await page.$('a[href*="/cars/"]');
        if (carLink) {
            const href = await page.evaluate(el => el.getAttribute('href'), carLink);
            const match = href.match(/\/cars\/([^/?#]+)/);
            if (match) firstCarSlug = match[1];
        }
    } catch (e) {
        console.warn('Could not extract car slug:', e.message);
    }

    if (firstCarSlug) {
        await testUrl(`Frontend: Car Details (/cars/${firstCarSlug})`, `/cars/${firstCarSlug}`, '.tour-header');
    }

    // 2. ADMIN AUTHENTICATION
    console.log('\n--- 2. Testing Admin Authentication ---');
    await testUrl('Admin: Login Page', '/admin/login', 'form');

    // Perform Login
    console.log('Performing Admin Login...');
    await page.goto(BASE_URL + '/admin/login', { waitUntil: 'networkidle0' });
    await page.waitForSelector('input[type="email"]');
    await page.type('input[type="email"]', 'admin@admin.com');
    await page.type('input[type="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForNavigation({ waitUntil: 'networkidle0' });
    console.log('Logged in successfully, current URL:', page.url());

    // 3. ADMIN PANEL RESOURCE TESTS
    console.log('\n--- 3. Testing Admin Panel Resources ---');
    await testUrl('Admin: Dashboard', '/admin', '.fi-topbar', true);
    await testUrl('Admin: Site Settings', '/admin/manage-settings', 'form', true);
    await testUrl('Admin: Home Editor', '/admin/manage-homepage-settings', 'form', true);
    await testUrl('Admin: Cars Inventory', '/admin/cars', '.fi-ta-table', true);
    await testUrl('Admin: Brands', '/admin/brands', '.fi-ta-table', true);
    await testUrl('Admin: Services', '/admin/services', '.fi-ta-table', true);
    await testUrl('Admin: Team Members', '/admin/team-members', '.fi-ta-table', true);
    await testUrl('Admin: Inquiries Inbox', '/admin/inquiries', '.fi-ta-table', true);
    await testUrl('Admin: Why Us Features', '/admin/why-us-features', '.fi-ta-table', true);
    await testUrl('Admin: Car Types', '/admin/car-types', '.fi-ta-table', true);
    await testUrl('Admin: Fuel Types', '/admin/fuel-types', '.fi-ta-table', true);

    await browser.close();

    console.log('\n====================================================');
    console.log('📊 TEST SUMMARY & SCORECARD');
    console.log('====================================================');
    const totalTests = results.length;
    const passedTests = results.filter(r => r.passed).length;
    const failedTests = totalTests - passedTests;

    console.log(`Total Routes Tested: ${totalTests}`);
    console.log(`Passed (Zero Errors): ${passedTests}`);
    console.log(`Failed / Warnings:   ${failedTests}`);
    console.log('====================================================\n');

    if (failedTests > 0) {
        console.error('❌ One or more tests failed or logged errors.');
        process.exit(1);
    } else {
        console.log('🎉 ALL TESTS PASSED WITH 0 ERRORS!');
        process.exit(0);
    }
}

runVisualTests().catch(err => {
    console.error('Fatal Test Runner Error:', err);
    process.exit(1);
});
