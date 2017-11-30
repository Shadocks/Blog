# MBBlog
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/1b12f574-6a43-4479-86df-4e602609becf/big.png)](https://insight.sensiolabs.com/projects/1b12f574-6a43-4479-86df-4e602609becf)
## Description
The MBBlog application is a study project. It is programmed in PHP OOP. The features/pages requested for this blog project are:
- page listing the articles
- page detailing an article
- contact page via a form (sending an e-mail to the admin)
- article modification page
- deleting an article
- download curriculum vitae
## Installation
Local operating configuration:
- Wampserver64 (PHP 7.1.9; MySQL 5.7.19; Apache 2.4.27; phpMyAdmin 4.7.4)

- Composer [download](https://getcomposer.org/download/)

- Blog start 
  - Use the **PHP** server
      - In the console, move to the public folder `cd public` (ex: `cd wamp64\www\MBBlog\public`)
      - Enter the following command: `php -S localhost:9800 index.php`
      - Access the project via your browser: `http://localhost:9800`
      
   - Or virtualhost **Apache**
      - Configuration template :
      
```apache
<VirtualHost *:80>
	ServerName NAME_OF_SERVER
	DocumentRoot "c:/wamp64/www/PATH_TO_THE_BLOG_FOLDER/blog/public"
	<Directory  "c:/wamp64/www/PATH_TO_THE_BLOG_FOLDER/blog/public/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
		FallbackResource /index.php
	</Directory>
</VirtualHost>
```

- Mail
  - You will need an SMTP to send e-mail. The configuration of the mailer.php.dist file is necessary (path: root/config/mailer.php.dist).

```php
return [
    'host' => 'smtp.xxx.xxx',
    'port' => 000,
    'security' => 'xxx',
    'username' => 'xxx',
    'password' => 'xxx'
];
```
- After the configuration done, rename `mailer.php.dist` to `mailer.php`.
