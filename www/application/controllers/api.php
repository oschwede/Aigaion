<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?><?php

class Api extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        echo "topics";
        //exit(__('no command'));
        exit();
    }

    function topics()
    {
        $topic_id = $this->uri->segment(3, '');
        if ($topic_id == '')
            $topic_id = 1;


        $ty = $this->input->get('ty',true);
        if ($this->input->get('ty',true)) {
            $ty = 1;
        }
            // filter by type of publication
        //print_r($get);


        $config = array('onlyIfUserSubscribed' => False,
            'flagCollapsed' => True,
            //'user'=>1,
            'includeGroupSubscriptions' => True
        );

        $topic = $this->topic_db->getByID($topic_id, $config);
        echo "topic " . $topic_id . " - " . $topic->name . "<br>\n";

        $subtopics = $this->topic_db->getChildren($topic_id, $config);

        echo "-- subtopics (" . count($subtopics) . ") --<br />\n";
        foreach ($subtopics as $subtopic) {
            echo $subtopic->topic_id . " - ";
            echo $subtopic->name;
            echo "<br>\n";
        }

        $pubs = $this->publication_db->getForTopic($topic_id);

        echo "<br>\n";
        echo "-- publications (" . count($pubs) . ") -- <br />\n";
        foreach ($pubs as $pub) {
            echo $pub->pub_id . "-";
            echo $pub->pub_type . "- ";
            echo $pub->title;
            echo "<br>\n";
        }
        echo "<br>\n";

        //print_r($pubs);

        //print_r ($root);
        echo '-- fim --';
    }


    function _embed($content, $target)
    {
        $shareddomain = getConfigurationSetting('EMBEDDING_SHAREDDOMAIN');
        if ($shareddomain == '') exit (__("Aigaion error: no shared domain configured in the Aigaion database"));
        header("Content-Type: text/html; charset=UTF-8");
        $output = "<html><head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    </head><body><div id='embeddingcontent' name='embeddingcontent'>";
        $output .= $content;
        $output .= "</div>
<script type='text/javascript' src='" . AIGAION_WEBCONTENT_URL . "javascript/prototype.js'></script>
<script type='text/javascript' src='" . AIGAION_WEBCONTENT_URL . "javascript/scriptaculous.js'></script>
<script type='text/javascript' src='" . AIGAION_WEBCONTENT_URL . "javascript/builder.js'></script>
<script type='text/javascript' src='" . AIGAION_WEBCONTENT_URL . "javascript/externallinks.js'></script>
<script type='text/javascript' src='" . AIGAION_WEBCONTENT_URL . "javascript/YAHOO.js'></script>
<script type='text/javascript' src='" . AIGAION_WEBCONTENT_URL . "javascript/connection.js'></script>
<script language='javascript'>
  //this needs to be changed to your own domain:
  document.domain='" . $shareddomain . "';
  window.parent.doEmbedding($('embeddingcontent').innerHTML,'" . $target . "');
</script></body></html>
";
        exit ($output);

    }
}

?>