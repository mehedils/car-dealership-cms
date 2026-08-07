<div class="card-journey-small background-card hover-up">
    <div class="card-image">
        <a href="/cars-details-3">
            <img src="/assets/imgs/cars-listing/cars-listing-6/{{ $car['image'] }}" alt="Carento">
        </a>
    </div>
    <div class="card-info p-4 pt-30">
        <div class="card-rating">
            <div class="card-left"></div>
            <div class="card-right">
                <span class="rating text-xs-medium rounded-pill">{{ $car['rating'] }} <span class="text-xs-medium neutral-500">(672 reviews)</span></span>
            </div>
        </div>
        <div class="card-title"><a class="text-lg-bold neutral-1000 text-nowrap" href="/cars-details-3">{{ $car['name'] }}</a></div>
        <div class="card-program">
            <div class="card-location">
                <p class="text-location text-sm-medium neutral-500">{{ $car['location'] }}</p>
            </div>
            <div class="card-facitlities">
                <p class="card-miles text-md-medium">25,100 miles</p>
                <p class="card-gear text-md-medium">Automatic</p>
                <p class="card-fuel text-md-medium">{{ $car['fuelType'] }}</p>
                <p class="card-seat text-md-medium">7 seats</p>
            </div>
            <div class="endtime">
                <div class="card-price">
                    <h6 class="text-lg-bold neutral-1000">${{ $car['price'] }}</h6>
                    <p class="text-md-medium neutral-500">/ day</p>
                </div>
                <div class="card-button"><a class="btn btn-gray" href="/cars-details-3">Book Now</a></div>
            </div>
        </div>
    </div>
</div>
