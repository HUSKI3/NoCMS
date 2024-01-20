<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("Foreword | NoPHP");

echo 
<body class="bg-dark">
    <div class="row" style="width: 99%; height:99%">
    DocsCommon/build_navigation()
        .<main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        DocsCommon/build_topbar()
            .<div class="pt-5 d-flex justify-content-center contentcrop content">
                <div>
                    <h1> "Foreword" </h1>
                    .<p> nl2br(`
                    Looking at NoPHP, a question might arise in your mind: What is this for?

                    To answer this question simply:
                    NoPHP was created to solve issues that are caused by PHP being an old language
                    without the features most developers are used to. Some may consider this otherwise.
                    The vision of this project is to create a language that is fundamentally different from PHP
                    while maintaining similar functionality and syntactic sugar.

                    Yes, Laravel exists. However their approach is different, they aim to *fix* what they 
                    see wrong with PHP. Whilst our approach is to create what PHP was meant to be, without 
                    sacrificing the comfort of modern languages and idioms. 

                    `)
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>;



?>