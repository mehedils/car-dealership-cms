import puppeteer from '/home/mehedi/.bun/install/global/node_modules/puppeteer';
import fs from 'fs';
import path from 'path';

const SCREENSHOT_DIR = path.resolve('docs/screenshots');
if (!fs.existsSync(SCREENSHOT_DIR)) {
    fs.mkdirSync(SCREENSHOT_DIR, { recursive: true });
}

async function run() {
    console.log('Launching headless browser...');
    const browser = await puppeteer.launch({
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox', '--window-size=1440,900']
    });

    const page = await browser.newPage();
    await page.setViewport({ width: 1440, height: 900, deviceScaleFactor: 1 });

    // 1. Capture Frontend Sections
    console.log('Capturing Frontend pages...');
    
    // Homepage: Header & Topbar
    await page.goto('http://127.0.0.1:8000/', { waitUntil: 'networkidle0' });
    await page.evaluate(() => window.scrollTo(0, 0));
    await page.screenshot({ 
        path: path.join(SCREENSHOT_DIR, '01-frontend-header-topbar.png'),
        clip: { x: 0, y: 0, width: 1440, height: 180 }
    });
    console.log('Saved 01-frontend-header-topbar.png');

    // Homepage: Hero Section
    await page.screenshot({ 
        path: path.join(SCREENSHOT_DIR, '02-frontend-hero.png'),
        clip: { x: 0, y: 150, width: 1440, height: 650 }
    });
    console.log('Saved 02-frontend-hero.png');

    // Homepage: Brands Section
    const brandSection = await page.$('.box-search-category');
    if (brandSection) {
        await brandSection.screenshot({ path: path.join(SCREENSHOT_DIR, '03-frontend-brands.png') });
    } else {
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, '03-frontend-brands.png'), clip: { x: 0, y: 750, width: 1440, height: 260 } });
    }
    console.log('Saved 03-frontend-brands.png');

    // Homepage: Why Choose Us Section
    await page.evaluate(() => {
        const el = document.querySelector('.box-why-book-2') || document.querySelector('section.box-why-book-22');
        if (el) el.scrollIntoView();
    });
    await new Promise(r => setTimeout(r, 600));
    const whyUsSection = await page.$('.box-why-book-2') || await page.$('section.box-why-book-22');
    if (whyUsSection) {
        await whyUsSection.screenshot({ path: path.join(SCREENSHOT_DIR, '05-frontend-why-us.png') });
    } else {
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, '05-frontend-why-us.png'), clip: { x: 0, y: 1600, width: 1440, height: 500 } });
    }
    console.log('Saved 05-frontend-why-us.png');

    // Homepage: Footer
    await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight));
    await new Promise(r => setTimeout(r, 600));
    const footerEl = await page.$('footer.footer');
    if (footerEl) {
        await footerEl.screenshot({ path: path.join(SCREENSHOT_DIR, '08-frontend-footer.png') });
    } else {
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, '08-frontend-footer.png') });
    }
    console.log('Saved 08-frontend-footer.png');

    // Inventory Page (/cars)
    await page.goto('http://127.0.0.1:8000/cars', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '04-frontend-inventory.png'), clip: { x: 0, y: 0, width: 1440, height: 850 } });
    console.log('Saved 04-frontend-inventory.png');

    // Services Page (/services)
    await page.goto('http://127.0.0.1:8000/services', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '06-frontend-services.png'), clip: { x: 0, y: 0, width: 1440, height: 850 } });
    console.log('Saved 06-frontend-services.png');

    // About Us Page (/about)
    await page.goto('http://127.0.0.1:8000/about', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '07-frontend-about.png'), clip: { x: 0, y: 0, width: 1440, height: 850 } });
    console.log('Saved 07-frontend-about.png');

    // Contact Page (/contact)
    await page.goto('http://127.0.0.1:8000/contact', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '09-frontend-contact.png'), clip: { x: 0, y: 0, width: 1440, height: 850 } });
    console.log('Saved 09-frontend-contact.png');


    // 2. Admin Panel Authentication
    console.log('Logging in to Filament Admin Panel...');
    await page.goto('http://127.0.0.1:8000/admin/login', { waitUntil: 'networkidle0' });
    await page.waitForSelector('input[type="email"]');
    await page.type('input[type="email"]', 'admin@admin.com');
    await page.type('input[type="password"]', 'password');
    await page.click('button[type="submit"]');
    await page.waitForNavigation({ waitUntil: 'networkidle0' });
    console.log('Admin login successful. Landed on:', page.url());

    // Admin: General Settings & Branding
    await page.goto('http://127.0.0.1:8000/admin/manage-settings', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '01-admin-settings-branding.png') });
    console.log('Saved 01-admin-settings-branding.png');

    // Click on Contact Info Tab
    const tabs = await page.$$('button[role="tab"]');
    for (const tab of tabs) {
        const text = await page.evaluate(el => el.textContent, tab);
        if (text && (text.includes('Contact Info') || text.includes('Contacto'))) {
            await tab.click();
            await new Promise(r => setTimeout(r, 500));
            await page.screenshot({ path: path.join(SCREENSHOT_DIR, '08-admin-settings-contact.png') });
            console.log('Saved 08-admin-settings-contact.png');
            break;
        }
    }

    // Admin: Home Editor (ManageHomepageSettings)
    await page.goto('http://127.0.0.1:8000/admin/manage-homepage-settings', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '02-admin-home-editor.png') });
    console.log('Saved 02-admin-home-editor.png');

    // Admin: Brands Resource
    await page.goto('http://127.0.0.1:8000/admin/brands', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '03-admin-brands.png') });
    console.log('Saved 03-admin-brands.png');

    // Admin: Cars List
    await page.goto('http://127.0.0.1:8000/admin/cars', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '04-admin-cars-list.png') });
    console.log('Saved 04-admin-cars-list.png');

    // Admin: Car Edit / View first car
    const firstCarEdit = await page.$('a[href*="/admin/cars/"][href*="/edit"]');
    if (firstCarEdit) {
        await firstCarEdit.click();
        await page.waitForNavigation({ waitUntil: 'networkidle0' });
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, '04-admin-car-edit.png') });
        console.log('Saved 04-admin-car-edit.png');
    }

    // Admin: Why Us Features
    await page.goto('http://127.0.0.1:8000/admin/why-us-features', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '05-admin-why-us.png') });
    console.log('Saved 05-admin-why-us.png');

    // Admin: Services
    await page.goto('http://127.0.0.1:8000/admin/services', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '06-admin-services.png') });
    console.log('Saved 06-admin-services.png');

    // Admin: Team Members
    await page.goto('http://127.0.0.1:8000/admin/team-members', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '07-admin-team.png') });
    console.log('Saved 07-admin-team.png');

    // Admin: Inquiries (Bandeja de Consultas)
    await page.goto('http://127.0.0.1:8000/admin/inquiries', { waitUntil: 'networkidle0' });
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, '09-admin-inquiries.png') });
    console.log('Saved 09-admin-inquiries.png');

    await browser.close();
    console.log('All screenshots captured successfully!');
}

run().catch(err => {
    console.error('Error during screenshot capture:', err);
    process.exit(1);
});
