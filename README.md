<strong>Instructions:</strong

Download the zip file and install it like any other plugin (either through the WP admin panel, or uploading into your plugins folder via FTP and unzipping).
Note that you must have WooCommerce and WP GraphQL (https://github.com/wp-graphql/wp-graphql) installed.
** This plugin assumes WP GraphQL is installed on your server under the path /wp-graphql-develop/wp-graphql.php. Otherwise it will throw an error, so check your plugins folder for /wp-graphql/ directory if this happens. Need to find a better way to check for dependencies **
To those of you unfamiliar with GraphQL: why should this interest you?

WordPress is by far the most utilised platform for building websites and web apps todayIts WooCommerce add-on is probably the most widely used eCommerce system. Traditionally, WordPress has often looked down open by developers - sometimes justifiably. Its monolithic architecture was not designed for the cloud. Furthermore, WooCommerce's performance is inextricably coupled to the WordPress infrastructure it sits upon... but there is a solution!

In comes GraphQL. Most of you would probably be familiar with REST APIs and the concept of "decoupled CMS", where something like WordPress uses PHP in the backend and a react/vue/angular SPA powers the front-end. GraphQL is essentially an upgrade on REST in terms of efficiency and scalability. It is an open-source language originally created by Facebook for internal use. GraphQL represents the relationships between objects as a virtual graph (with features like pagination and edges/connections between nodes), thus allowing for intelligent queying the data.

Though designed to handle Facebook's enormous amount of social data, GraphQL could find utility almost anywhere. Combined with other tools - such as Scalability Pro (https://www.wpintense.com/product/scalability-pro), which drastically reduces WP table scans - it is possible to modernise the stack powering your WooCommerce store and have it capable of selling hundreds of thousands of products with minimal impact on performance.

<strong>Potential stack for maximal WordPress/WooCommerce performance:</strong> LEPP [Linux, NGINX, PHP7-FPM, PerconaDB with InnoDB engine] + Redis object cache.
