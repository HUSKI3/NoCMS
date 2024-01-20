<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("The NoPHP Programming Language Book");

echo 
<body class="bg-dark">
    <div class="row" style="width: 99%; height:99%">
    DocsCommon/build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        DocsCommon/build_topbar()
            .<div class="pt-5 d-flex justify-content-center contentcrop content">
                <div>
                    <h1> "Welcome to NoPHP" </h1>
                    .<p class="lead"> "by Artur Zaytsev with help (and hate) from Kunal Dandekar" </p>
                    .<p> nl2br(`
                    This book assumes that you are using NoPHP version 0.1.5 or later. 
                    Some topics covered may become outdated by the next major release.

                    This book takes inspiration from the Rust Programming Language Book.
                    
                    You can use the side bar to navigate to different viewcontrollers and topics.
                    `)
                    </p>
                    .<p class="text-center text-muted"> "Built with ❤️ and NoPHP (" . nophp_version() . ")" </p>
                </div>
            </div>
        </main>
    </div>
</body>;
// ?debug;

?>