<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("Getting Started | NoPHP");

echo 
<body class="bg-dark">
    <div class="row" style="width: 99%; height:99%">
        DocsCommon/build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            DocsCommon/build_topbar()
            .<div class="pt-5 d-flex justify-content-center contentcrop content">
                <div>
                    <h1> "Getting Started" </h1>
                    .<p> nl2br(`
                    In this chapter, we will cover how to get started with NoPHP development
                    `)
                    </p>

                    .<h4> "Installation" </h4>
                    .<p> nl2br(
                        `Installing NoPHP is simple. All you need is to choose which backend you would like. 
                    Currently only the Python backend is fully supported by the latest (at the time of writing
                     0.1.6rc) version of NoPHP.
                    `)
                    </p>
                    .?</br>

                    .<h5> "Python" </h5>
                    .<p> nl2br(
                    `The Python backend requires Python 3.10 or later to be installed. For the sake of 
                    compatibility and consistency, it is recommended to use the latest stable version
                    of NoPHP - 0.1.5
                    `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(`$ pip install nophp==0.1.5`)
                        </code>
                    </pre>
                    .?</br>

                    .<h4> "Updating" </h4>
                    .<p> nl2br(
                        `Updating can be performed via any of the following language's package managers.
                        For Python this will be pip, for Rust it's WIP.
                    `)
                    </p>
                    .?</br>

                    .<h5> "Python" </h5>
                    .<p> nl2br(
                    `To update directly via pip, you need to call the same install command with
                    the update parameter.
                    `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(`$ pip install nophp -U`)
                        </code>
                    </pre>
                    .?</br>

                    .<h5> "Creating a Project" </h5>
                    .<p> nl2br(
                    `NoPHP does not require a specific folder structure, but the following
                    is recommended:
                    `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(
`ExampleProject
├── README
├── app
│   └── viewcontrollers
│       ├── index.php
│       └── about.php
├── static
│   └── image.png
└── config
    └── wool.yaml
`)
                        </code>
                    </pre>
                    .<ul>
                        <li> "Readme - The README will contain an overview of your project" </li>
                        .<li> "app - The app directory should contain all of your NoPHP code" </li>
                        .<li> "static - The static directory should contain all of your resources" </li>
                        .<li> nl2br(`config - The config directory should contain 
                        your [Wool](wool-explanation) configuration file`) </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>;



?>