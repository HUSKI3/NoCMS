<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("Spindle | NoPHP");

echo 
<body class="bg-dark">
    <div class="row" style="width: 99%; height:99%">
        DocsCommon/build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            DocsCommon/build_topbar()
            .<div class="pt-5 d-flex justify-content-center contentcrop content">
                <div>
                    <h1> "Spindle" </h1>
                    .<p> nl2br(`
                    Spindle is an important aspect of the NoPHP language. It provides a webserver
                    that can parse, tokenize, and compile a NoPHP page on a give request to a route.
                    The routes are defined in the wool.yaml file.

                    The current backend for Spindle is Flask, it is not recommended to use any 
                    version prior the 0.2.0 release in production environments. 0.2.0 will have an
                    option to utilize a WSGI backend. 
                    `)
                    </p>

                    .<h5> "Usage" </h5>
                    .<p> nl2br(
                    `To use spindle, you must create a configuration file that will house information
                    about the routes that can be accessed by the user in your application. This 
                    configuration file is normally named "wool.yaml", and contains the configuration
                    in the following format:
                    `)
                    </p>
                    .<pre>
                        <p> "wool.yaml" </p>
                        .<code style="text-align: start !important;">
                            htmlspecialchars(
`---
app: Example App # Application name
secret_key: NJD92H4R48HF9H92FH # Secret key to be used for sessions
routes:
  /: viewcontrollers/index.php # Index route
  /store: viewcontrollers/store.php # An example store route
static:
  /files/<path:path>: static/ # Static route for any files used by your app
json: # API endpoints should be here so that you can respond with JSON responses  
  /api/getproducts: app/api/get_products.php 
`)
                        </code>
                    </pre>
                    
                    .<h5> "Running your application" </h5>
                    .<p> nl2br(
                    `To run your application with spindle. You can use the following command:
                    `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(`$ python -m nophp config/wool.yaml # or any location of the config file`)
                        </code>
                    </pre>
                    .<p> nl2br(
                        `Once you see the routes have been created and the IP address is shown,
                        you can go to it in the browser of your choosing.
                        `)
                    </p>
                    .<p> nl2br(
                        `To run your application with spindle in a production env. You can use the following command:
                        `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(`$ python -m nophp config/wool.yaml -o 0.0.0.0 -p 80`)
                        </code>
                    </pre>
                </div>
            </div>
        </main>
    </div>
</body>;

?>