<?php //this file must be mentioned in the .gitignore file
      //but the project works with a local database, so there isn't any information leak
      class dbCredit{
            public $db_host       = "localhost";
            public $db_port       = "5432";
            public $db_username   = "postgres";
            public $db_password   = "admin";
            public $db_name       = "weblogin";
        
            public $db_schema     = "public";
            public $db_usersTable = "users";
            public $db_postsTable = "posts";
            public $db_commentsTable = "comments";
            public $db_topicsTable = "topics";
            public $db_resolverUserGroup = "resolverUserGroup";
            public $db_resolverPostTopic = "resolverPostTopic";
            public $db_groups = "groups";
            public $db_messages = "messages";
      }

?>
