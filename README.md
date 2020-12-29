<p align="center">
    <b> 🌧 weatherStationApiSymfony 🌧</b>
</p>
<p align="center">
    <img src="https://github.com/danistark1/weatherStationApiSymfony/blob/main/animatedCloud.gif" />
</p>


Symfony REST APIs for the weatherStation project https://github.com/danistark1/weatherStation

# Setup

- composer install
- bin/console doctrine:database:create
- bin/console doctrine:migrations:migrate

**.env**

DATABASE_URL=mysql://root:@database:3306/weatherStation

 **Email Configuration (For weather report)**

- MAILER_DSN=gmail+smtp://yoursendfromemail:yourpassword
- FROM_EMAIL=
- TO_EMAIL=
- EMAIL_TITLE="Your weather report title"
- TIMEZONE="Default is America/Toronto"
- FIRST_REPORT_TIME="Default 07:00:00"
- SECOND_REPORT_TIME="Default 20:00:00"

# Weather Report

![Weather Report](https://github.com/danistark1/weatherStationApiSymfony/blob/main/sampleEmail.png)

Readings from all configured sensors is sent in an email, twice a day (by default 07:00 AM and 08:00 PM, and can be configred using FIRST_REPORT_TIME & SECOND_REPORT_TIME from .env file).

# Usage / REST API Calls

**POST**

- POST weatherstationapi/

Everytime a record is posted, a call to 

**DELETE**

- DELETE weatherstationapi/{interval}

that deletes all weather data older than interval (default is 1 day).

ex.
```json
{
    "room": "outside",
    "temperature": 3,
    "humidity": 45,
    "station_id": 6126
}
```

**GET**

- GET weatherstationapi/{station_ID} by_station_id
- GET weatherstationapi/{name} by_room_name

[![forthebadge](https://forthebadge.com/images/badges/open-source.svg)](https://forthebadge.com)
