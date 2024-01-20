<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("Introduction | NoPHP");

echo 
<body class="bg-dark">
    <div class="row" style="width: 99%; height:99%">
        DocsCommon/build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            DocsCommon/build_topbar()
            .<div class="pt-5 d-flex justify-content-center contentcrop content">
                <div>
                    <h1> "Introduction" </h1>
                    .<p> nl2br(`
                    Welcome to the NoPHP Programming Language Book! Hopefully by the end of 
                    it, you will learn the basics of NoPHP, and have a fully functional website.

                    `)
                    </p>
                    .<h4> "Who is NoPHP for" </h4>
                    .<p> nl2br(`
                    NoPHP is for developers that are interested in learning PHP without having to
                    be frustrated over ancient tech stacks and suboptimal package management. 

                    NoPHP is for hackers that want to modify the language to suit their needs. 

                    NoPHP is for the diehard PHP fans that are looking to branch out into something new.

                    NoPHP is for everyone.


                    In the perfect world, NoPHP could be used by anyone, anywhere for anything. It is
                    what you make it to be. An easy to modify language was a dream for many developers.
                    NoPHP tries to make this dream possible by providing easy to add "Modules" that expand 
                    the functionality of the language. The underlying Rust (WIP) or Python backends 
                    allow your code to be suitable for any environment and any project. 
                    `)
                    </p>
                    .<pre>
                            <code style="text-align: start !important;">
                                htmlspecialchars(`echo <p> "Say hello to modernity!" </p>;`)
                            </code>
                        </pre>
                </div>
            </div>
        </main>
    </div>
</body>;



?>