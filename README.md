# mailing-address-validator
Validate/Standardize addresses using USPS

# Getting the sources
First clone the repository:



Installation on Local Computer
------------------------------

1. Install Apache on your local computer
2. Install MySQL on your local computer
3. Git Clone source code 

```bash  
git clone https://github.com/encoresky/mailing-address-validator.git
```

4. Configure the database connection by editing the db.php

```bash  
define("DB_HOST", "localhost");
define("DB_USERNAME", "");
define("DB_PASSWORD", "");
define("DB_NAME", "");
```

5. Configure the USPS connection by editing the db.php

```bash  
define("USPS_BASE_URL", "https://us-street.api.smartystreets.com/");
define("USPS_API", "street-address");
define("USPS_AUTH_ID", "ed764521-d73f-41dd-e8a6-ff74159fbc2e");
define("USPS_AUTH_TOKEN", "bZoXjPoBFY2FOlA8ChIt333333");
define("USPS_LICENSE", "us-core-cloud-ddd");
define("USPS_CANDIDATES", "10");
define("USPS_MATCH", "enhanced");
```

6. Access the web app vai below URL on local computer

```bash  
http://localhost/mailing-address-validator
```