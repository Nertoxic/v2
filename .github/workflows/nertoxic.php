name: Nertoxic Framework Test

on:
    push:
        paths:
        - '**'

    pull_request:
        paths:
        - '**'

permissions:
    contents: read

jobs:
    code-review:
    name: Framework Test by Nertoxic
        runs-on: ubuntu-latest

    steps:
    - name: Package Updating
        run: sudo apt-get update

    - name: Checkout
        uses: actions/checkout@v4

    - name: PHP Setup
        uses: shivammathur/setup-php@v2

    with:
        php-version: '8.2'

        - name: Composer installation
            run: composer update

        - name: Run PHP Test
            working-directory: public/
            run: php index.php