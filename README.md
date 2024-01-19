
### Installation

1. If it's your first time fresh setup Run this bash script 

    `chmod +x setup && ./setup `

2. If you already run the script successfully before only Run
    `./vendor/bin/sail up -d`

3. The data are cached and there is a cron job (worker automatically runs by supervisor) runs daily to clear the cache and get the updated data

### Ports

1. pgsql Port is : 3308

2. PHP server Port : 8081

You can change these ports on your local environment if not available.
