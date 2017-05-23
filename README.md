# SELF-3404: Shipping Insurance module example for Magento 1.x

This is my first Magento module 1.x.
Module allows to add shipping insurance for your orders. There are key ideas for it:
  - User can enable/disable feature in general in Admin panel
  - User can specify rates for insurance based on percentage of order or specify fixes amount
  - User can enable/disable feature for any shipping method
  - Module supports build-in Magento shipping methods and custom shipping methods implemented by other developers or from Magento Community
  - Info about Shipping insurance will be added to invoices, credit memo and other needed places.

### Some screens - public:
![alt tag](/dot/Selection_974.png?raw=true "Preview")
![alt tag](/dot/Selection_965.png?raw=true "Preview")

### Some screens - admin:
![alt tag](/dot/Selection_976.png?raw=true "Preview")
![alt tag](/dot/Selection_962.png?raw=true "Preview")
![alt tag](/dot/Selection_963.png?raw=true "Preview")
![alt tag](/dot/Selection_964.png?raw=true "Preview")

### Possible improvements:
  - Add config settings for insurance labels (frontend, admin sections) [No required in current iteration]

### Installation: Production

- Copy app/ folder inside your magento public root. Be careful, when you making copy of templates.
- Login into Admin panel and Enable 'Shipping Insurance module'.

Module will be available in Admin > Confirugation > Sales > Shippping Insurance Settings

### Installation: Sandbox via Magestead

There is ability to run Magento Sandbox VM via Composer. Please read instructions on MageStead web-site [https://www.magestead.com/] if you don't have experience with using it.

- Download and install Magestead globally in your machine.
```sh
$ composer global require richdynamix/magestead
```
- Add Magestead into your $PATH
- Create dummy Magento instance
```sh
$ cd ~/ && mrkir temp && cd temp
$ magestead new dummmy.magento
```
- Choose any server type but please use PHP 5.6 and Magento 1.x
- Disable all Magento caches
```sh
$ cd dummy.magento && magestead cache:clean && magestead cache:disable
```
- After VM will up please download dummy data into Magento from official Magento site - http://devdocs.magento.com/guides/m1x/ce18-ee113/ht_magento-ce-sample.data.html
- Unpack media/ and skin/ from dummy data into your project root
- Copy dummy db into project root for few minutes
- Login into VM and install DB via http://magerun.net/ Cli 
```sh
$ magestead vm:shh
$ cd /var/www/public
$ ./../bin/n98-magerun.phar db:import <NAME-OF-SQL-FILE-RECEIVED-FROM-MAGENTO-COMMUNITY>
```
- Create admin account
```sh
$ ./../bin/n98-magerun.phar admin:user:create
```
- Create dummy customer
```sh
$ ./../bin/n98-magerun.phar customer:create
```
- Enjoy Shipping insurance in Admin > Configuration > Sales > Shipping Insurance Settings

### Contributing
- Fork it!
- Create your feature branch: git checkout -b my-new-feature
- Have fun ;)
- Commit your changes: git commit -am 'Add some feature'
- Push to the branch: git push origin my-new-feature
- Submit a pull request
