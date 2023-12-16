## Installation

1. Install dependencies using Composer:
   ```bash
   composer install
    ```
2. Copy the .env.example file to .env and fill in the necessary environment variables:

   ```bash
   cp .env.example .env
   ```
   Edit the .env file and specify the appropriate values for your configuration.
3. Run database migrations using Phinx:
   ```bash
   vendor/bin/phinx migrate
    ```