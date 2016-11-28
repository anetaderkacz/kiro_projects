
1. Install:
    a) Copy cgi-bin folder content to your cgi-bin folder (eg. /var/www/cgi-bin, /usr/lib/cgi-bin).
    b) Copy upload.php and main.js to your www folder.
    c) Setup variables with the same value according to your web domain: 'host' in file 'main.js'  and  '$url' in file 'upload.php'.
    d) Setup variables '$tmp_dir' and '$upload_dir' in file cgi-bin/header.cgi. Paths can be diffrent but must indicate the same partition. Its need to move large files without long delay by rename them.
    
2. Notice:
    a) This project is based on projects "Mega Upload" and "XUpload".
	