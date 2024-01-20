<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("Hello World | NoPHP");

echo 
<body class="bg-dark">
    <div class="row" style="width: 99%; height:99%">
        DocsCommon/build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            DocsCommon/build_topbar()
            .<div class="pt-5 d-flex justify-content-center contentcrop content">
                <div>
                    <h1> "Hello World" </h1>
                    .<p> nl2br(`
                    Now that you have NoPHP installed, you can start writing your first application!
                    As with any language, a simple Hello World application is where it all begins.

                    `)
                    </p>

                    .<h5> "Creating a project" </h5>
                    .<p> nl2br(
                    `To get started with writing our application, let's first create a project that 
                    will house the app. This can easily be done via:
                    `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(`$ python -m nophp -n myproject`)
                        </code>
                    </pre>
                    .<p> nl2br(
                        `This command will create a sample project that contains the bare minimum 
                        to get up and started with working with NoPHP. You can check the specifics 
                        on what it creates over at: `) . <a href="/docs/getting-started"> "Getting Started" </a>
                    </p>
                    .?</br> // Split for clarity

                    .<h5> "Writing and running a NoPHP application" </h5>
                    .<p> nl2br(
                        `Now that we have a project, head over to myproject/viewcontrollers/index.php
                        This file will be our index/home page for the application. Let's start by greeting
                        the world!

                        In NoPHP this is simple and can be done via a single line. 
                        `)
                    </p>
                    .<pre>
                        <p> "index.php" </p>
                        .<code style="text-align: start !important;">
                            htmlspecialchars(`echo <p> "Hello World!" </p>;`)
                        </code>
                    </pre>
                    .<p> nl2br(
                    `Now that we have a basic app, let's run it!
                    `)
                    </p>
                    .<pre>
                        <code style="text-align: start !important;">
                            htmlspecialchars(`$ python -m nophp config/wool.yaml`)
                        </code>
                    </pre>

                    .<hr> <br> </hr> // Split off

                    // Move to the HTML Segment part?
                    .<p> nl2br(
                        `As you may notice, unlike in PHP, you can directly use HTML in NoPHP, this
                        is called an HTML Segment, and is checked for validity at run time. This 
                        is one of the most prominent features of NoPHP, but it does come with a few 
                        drawbacks. 

                        Unlike normal HTML, the HTML Segment requires proper seperation and will reject
                        invalid HTML. Just like in a normal function, an HTML Segment takes a value,
                        strings must be defined with a valid "" surrounding character, while empty
                        HTML Segments should be populated with null.

                        HTML Segments can be connected together with other HTML segments using the "."
                        symbol normally used for string concatenation.
                        `)
                    </p>
                    .<pre>
                        <p> "Valid HTML Segment" </p>
                        .<code style="text-align: start !important;">
                            htmlspecialchars(`<p> "Hello" </p> . <h1> "World!" </h1>`)
                        </code>
                    </pre>

                    .<pre>
                        <p> "Invalid HTML Segment" </p>
                        .<code style="text-align: start !important;">
                            htmlspecialchars(`<p> "Hello" </p> <h1> "World!" <h1>`)
                        </code>
                    </pre>
                </div>
            </div>
        </main>
    </div>
</body>;

?>