<?php

require_once('docs/common.php');

// 99% height and width is a hack fix for overflowing containers

title("API | NoCMS");

echo 
<body class="bg-dark">
    <div class="col" style="">
        <main class="pt-5 pb-5">
            <div class="d-flex justify-content-center">
                <div>
                    <h1> "NoCMS API" </h1>
                    .<p> nl2br(`
                    You can utilize the following API to add the CMS features to your website.

                    `)
                    </p>

                    .<h5> "Get All Posts" </h5>
                    .<pre>
                        <a href="/api/getposts"> <p> "/api/getposts" </p> </a>
                        .<code style="text-align: start !important;">
                            htmlspecialchars(
`[
    {
        "author": 0,
        "content": "content",
        "datetime": "2024-01-01 00:00:01",
        "id": 0,
        "title": "My Post",
        "visibility": "public"
    },
    ...
]`
)
                        </code>
                    </pre>


                    .<p> nl2br(
                        `Returns an array containing blog entries in the following structure:

                        author - author ID
                        content - blog post content
                        datetime - datetime of creation
                        id - blog post ID
                        title - blog post title
                        visibility - either public or private
                        `)
                    </p>
                    .?</br>

                    .<h5> "Get Specific Post" </h5>
                    .<pre>
                        <a href="/api/getpost?id=0"> <p> "/api/getpost?id=n" </p> </a>
                        .<code style="text-align: start !important;">
                            htmlspecialchars(
`{
    "author": 0,
    "content": "content",
    "datetime": "2024-01-01 00:00:01",
    "id": 0,
    "title": "My Post",
    "visibility": "public"
}`
)
                        </code>
                    </pre>

                    .<p> nl2br(
                        `Returns a single blog entry in the following structure:

                        author - author ID
                        content - blog post content
                        datetime - datetime of creation
                        id - blog post ID
                        title - blog post title
                        visibility - either public or private
                        `)
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>;

?>