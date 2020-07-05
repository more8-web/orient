template:

    <html>
        <head>
            <meta id="template-alias-author" value="Rob Stark">
            <meta id="template-alias-editor" value="Arya Stark">
        </head>
        <body>
            <h1 id="template-alias-content-title"></h1>
            <small id="template-alias-content-sign"></small>
            <p id="template-alias-content-article-first"></p>
            <p id="template-alias-content-article-second"></p>
            <p id="template-alias-content-article-last"></p>
        </body>
    </html>



tables:

    news {
        news_id
        news_alias
        news_status
    }

    news-categories {
        news_category_id
        news_category_parent_id -\____ combined unique key
        news_category_alias     -/
    }

    news-to-news-category {
        news_id
        news_category_id
    }

    news-to-keyword {
        news_id
        keyword_id
    }

    news-log {
        news_log_id
        news_id
        user_id
        news_log_event
        news_log_comment
        news_log_created_at
    }

    contents {
        content_id               // 12
        content_alias            // some text
        content_description      // some text
        content_value            // "Text of the first article. Bla-bla-bla. Anything text."
    }

    content-to-news {
        content_id          // 12
        news_id             // 3
    }

    content-to-html-tag {
        content_id           // 12
        html_tag_id          // template-alias-content-article-second
    }

    content-categories {
        content_category_id
        content_category_parent_id
        content_category_alias
    }

    content-to-content-category {
        content_id
        content_category_id
    }

    content-to-keyword {
        content_id
        keyword_id
    }

    keywords {
        keyword_id
        keyword_value
    }


endpoints:

    PUT    /news/category                  // new category
        Request: {
            Header: {
                User-Token
            },
            Body: {
                news_category_alias,
                news_category_parent_id = null
            }
        }
        Response: {
            Http.Status: 200,
            Body: {
                news_category_id,
                news_category_parent_id,
                news_category_alias
            }
        }
        AlreadyExistsException: {
            Http.Status: 400,
            Message: "Category {name} already exists"
        }
        InternalServerException: {
            Http.Status: 500,
            Message: "Internal Server Error"
        }

    POST   /news/categories/:id            // edit category
        Request: {
            Header: {
                User-Token
            },
            Body: {
                news_category_alias,
                news_category_parent_id
            }
        }
        Response: {
            Http.Status: 200,
            Body: {
                news_category_id,
                news_category_parent_id,
                news_category_alias
            }
        }
        AlreadyExistsException: {
            Http.Status: 400,
            Message: "Category {name} already exists"
        }
        InternalServerException: {
            Http.Status: 500,
            Message: "Internal Server Error"
        }

    DELETE /news/categories/:id            // delete category
    GET    /news/categories                // get category list
    GET    /news/categories/:id            // get one category by id
    GET    /news/categories/:id/news       // get news of category

    PUT     /news                           // new news
    POST    /news/:id                       // edit news
    DELETE  /news/:id                       // delete news
    GET     /news                           // get news list
    GET     /news/:id                       // get one news by id
    PUT     /news/categories/:id/news/:id   // bind news to category (news-to-news-category)
    DELETE  /news/categories/:id/news/:id   // unbind news to category (news-to-news-category)
    PUT     /news/:id/log                   // new log record to news
    GET     /news/:id/log                   // get log of news

    PUT     /content                                 // new content
    POST    /contents/:id                            // edit content
    DELETE  /contents/:id                            // delete content
    GET     /contents/:id                            // get one content
    PUT     /content/categories/:id/contents/:id     // bind content to content category (content-to-content-category)
    GET     /news/:id/contents                       // get all content of news
    GET     /news/:id/contents/:id                   // get one content of news
    PUT     /news/:id/contents/:id                   // bind content to news (news-content-to-news)
    PUT     /contents/:id/tags/:string_id            // bind content to html tag (news-content-to-html-tag)

    PUT    /content/category                  // new content category
    POST   /content/categories/:id            // edit content category
    DELETE /content/categories/:id            // delete content category
    GET    /content/categories                // get content category list
    GET    /content/categories/:id            // get one content category by id
    GET    /content/categories/:id/content    // get content of category

    PUT    /keyword                     // new keyword
    POST   /keywords/:id                // edit keyword
    DELETE /keywords/:id                // delete keyword
    GET    /keywords                    // get content category list
    GET    /keywords/:id                // get one content category by id
    PUT    /keywords/:id/news/:id       // bind keyword to news (news-to-keyword)
    DELETE /keywords/:id/news/:id       // bind keyword to news (news-to-keyword)
    PUT    /keywords/:id/contents/:id   // bind keyword to news (news-to-content)
    DELETE /keywords/:id/contents/:id   // bind keyword to news (news-to-content)






    news-tags
    news-types

