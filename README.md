# Transfer F-Secure Keys to LastPass
PHP tool for converting F-Secure Key file (.fsk) into LastPass accepted CSV format.

## How to use
1. Open F-Secure Key
2. Go to **Settings->Export**
3. Edit **$fs_filepath** and **$lp_filepath** in *index.php*
4. Open MAMP, WAMP or LAMP (local server application)
5. Run *index.php* via MAMP, WAMP or LAMP
6. Locate *file_for_lastpass_import.csv*
7. Open .csv file and copy it's contents
8. Sign into lastpass.com
9. Go to **More settings->Additional settings->Import**
10. Select source as *Generic CSV File*
11. Paste contents you copied from the .csv file
