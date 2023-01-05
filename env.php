<?php //this file must be mentioned in the .gitignore file
      //but the project works with a local database, so there isnt' any information leak
      class dbCredit{
            public $db_host       = "localhost";
            public $db_port       = "5432";
            public $db_username   = "postgres";
            public $db_password   = "admin";
            public $db_name       = "weblogin";
        
            public $db_schema     = "public";
            public $db_usersTable = "users";
            public $db_postsTable = "posts";
            public $db_replyTable = "reply";
            public $db_sportsTable = "sports";
            public $db_electronicsTable = "electronics";
            public $db_entertainmentTable = "entertainment";
            public $db_resolver = "resolver";
            public $db_group = "group";
            public $db_messages = "messages";
      }

?>