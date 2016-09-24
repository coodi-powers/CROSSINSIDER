<?php

class Page extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('page_m');
    }

    public function index() {

        // Fetch the page template
        //$this->data['page'] = $this->page_m->get_by_original(array('slug' => (string) $this->uri->segment(1)), TRUE);
        //count($this->data['page']) || show_404(current_url());

        $this->data['error_messages'] = '';
        $this->data['succes_messages'] = '';

        if($this->uri->segment(1) == '')
        {
            $this->data['page'] = $this->page_m->get(1);
        }
        else
        {
            $this->data['page'] = $this->page_m->get_by_original(array('slug' => (string) $this->uri->segment(1)), TRUE);
        }
        count($this->data['page']) || show_404(current_url());


        // Fetch the page data
        $method = '_' . $this->data['page']->template;
        $this->$method($this->data['page']->id);

        $this->data['menu_items'] = $this->page_m->get_nested(1);

        $this->load->model('interview_m');
        $interviews = $this->interview_m->get_interviews();

        $this->load->model('reportage_m');
        $reportages = $this->reportage_m->get_reportages();

        if($reportages[0]['datum'] > $interviews[0]['datum'])
        {
            $this->data['element'] = $reportages[0];
            $this->data['element']['id'] = $this->data['element']['reportage_id'];

            if($reportages[0]['type'] == '1')
            {
                $pagina = $this->page_m->get('32');
                $this->data['element']['detail_pagina'] = $pagina->slug;
            }
            if($reportages[0]['type'] == '2')
            {
                $pagina = $this->page_m->get('35');
                $this->data['element']['detail_pagina'] = $pagina->slug;
            }
        }
        else
        {
            $this->data['element'] = $interviews[0];
            $this->data['element']['id'] = $this->data['element']['interview_id'];

            if($interviews[0]['type'] == '1')
            {
                $pagina = $this->page_m->get('31');
                $this->data['element']['detail_pagina'] = $pagina->slug;
            }
            if($interviews[0]['type'] == '2')
            {
                $pagina = $this->page_m->get('34');
                $this->data['element']['detail_pagina'] = $pagina->slug;
            }
        }

        $this->data['plugins'] = $this->getPlugins();

        $this->data["extra_js"] .= '
        <script>
		$(document).ready(function() {

			$("#main-slider").owlCarousel({

				autoPlay: 2000, //Set AutoPlay to 3 seconds
				navigation : true,
				navigationText: ["<i class=\'fa fa-arrow-left left\' aria-hidden=\'true\'></i>","<i class=\'fa fa-arrow-right right\' aria-hidden=\'true\'></i>"],
				items : 1,
				itemsDesktop : [1199,1],
				itemsDesktopSmall : [979,1]

			});

		});
	</script>
        ';

        // Load the view
        $this->data['subview'] = $this->data['page']->template;
        $this->load->view('_main_layout', $this->data);
    }

    private function _archief($id)
    {
        //motocross-archief
        if($this->data['page']->id == '30')
        {
            $this->data['page_title'] = "Motocross archief";

            $arr_elements = array();

            $this->load->model('interview_m');
            $interviews = $this->interview_m->get_interviews('1', $_GET['id']);

            $this->load->model('reportage_m');
            $reportages = $this->data['elements'] = $this->reportage_m->get_reportages('1', $_GET['id']);


            $this->data['id_field'] = 'id';

            foreach ($interviews as $interview)
            {
                $arr_temp = array();
                $pagina = $this->page_m->get('31');

                $arr_temp['datum'] = $interview['datum'];
                $arr_temp['type'] = '1';
                $arr_temp['id'] = $interview['interview_id'];
                $arr_temp['titel_nl'] = $interview['titel_nl'];
                $arr_temp['intro_nl'] = $interview['intro_nl'];
                $arr_temp['afbeelding'] = $interview['afbeelding'];
                $arr_temp['auteur'] = $interview['auteur'];
                $arr_temp['id_field'] = $interview['interview_id'];
                $arr_temp['detail_page'] = $pagina->slug;

                array_push($arr_elements, $arr_temp);
            }

            foreach ($reportages as $reportage)
            {
                $arr_temp = array();
                $pagina = $this->page_m->get('32');

                $arr_temp['datum'] = $reportage['datum'];
                $arr_temp['type'] = '2';
                $arr_temp['id'] = $reportage['reportage_id'];
                $arr_temp['titel_nl'] = $reportage['titel_nl'];
                $arr_temp['intro_nl'] = $reportage['intro_nl'];
                $arr_temp['afbeelding'] = $reportage['afbeelding'];
                $arr_temp['auteur'] = $reportage['auteur'];
                $arr_temp['id_field'] = $interview['reportage_id'];
                $arr_temp['detail_page'] = $pagina->slug;

                array_push($arr_elements, $arr_temp);
            }

            usort($arr_elements, function($a1, $a2) {
                $v1 = strtotime($a2['datum']);
                $v2 = strtotime($a1['datum']);
                return $v1 - $v2; // $v2 - $v1 to reverse direction
            });

            $arr_recent = array();
            $i = 0;
            foreach ($arr_elements as $element)
            {
                if($i < 5)
                {
                    array_push($arr_recent, $element);
                }
                $i++;
            }

            $this->data['elements'] = $arr_elements;
            $this->data['recent_elements'] = $arr_recent;
        }

        //motocross-interviews
        if($this->data['page']->id == '31')
        {
            $this->data['page_title'] = "Motocross interviews";

            $this->load->model('interview_m');
            $this->data['id_field'] = 'interview_id';

            $this->data['elements'] = $this->interview_m->get_interviews('1', $_GET['id']);
            $this->data['recent_elements'] = $this->interview_m->get_interviews('1', $_GET['id'], '5');

        }

        //motocross-foto
        if($this->data['page']->id == '32')
        {
            $this->data['page_title'] = "Motocross foto's";

            $this->load->model('reportage_m');
            $this->data['id_field'] = 'reportage_id';

            $this->data['elements'] = $this->reportage_m->get_reportages('1', $_GET['id']);
            $this->data['recent_elements'] = $this->reportage_m->get_reportages('1', $_GET['id'], '5');

            if($_GET['id'] > 0)
            {
                $this->data['extra_js'] = '
                <script>
                    $(document).ready(function() {
                
                        $(\'.flexslider\').flexslider({
                            animation: "slide"
                          });
                        
                    });
                
                </script>
                ';
            }
        }

        //cyclocross-archief
        if($this->data['page']->id == '33')
        {
            $this->data['page_title'] = "Cyclocross archief";

            $arr_elements = array();

            $this->load->model('interview_m');
            $interviews = $this->interview_m->get_interviews('2', $_GET['id']);

            $this->load->model('reportage_m');
            $reportages = $this->data['elements'] = $this->reportage_m->get_reportages('2', $_GET['id']);

            $this->data['id_field'] = 'id';

            foreach ($interviews as $interview)
            {
                $arr_temp = array();
                $pagina = $this->page_m->get('34');

                $arr_temp['datum'] = $interview['datum'];
                $arr_temp['type'] = '1';
                $arr_temp['id'] = $interview['interview_id'];
                $arr_temp['titel_nl'] = $interview['titel_nl'];
                $arr_temp['intro_nl'] = $interview['intro_nl'];
                $arr_temp['afbeelding'] = $interview['afbeelding'];
                $arr_temp['auteur'] = $interview['auteur'];
                $arr_temp['id_field'] = $interview['interview_id'];
                $arr_temp['detail_page'] = $pagina->slug;

                array_push($arr_elements, $arr_temp);
            }

            foreach ($reportages as $reportage)
            {
                $arr_temp = array();
                $pagina = $this->page_m->get('35');

                $arr_temp['datum'] = $reportage['datum'];
                $arr_temp['type'] = '2';
                $arr_temp['id'] = $reportage['reportage_id'];
                $arr_temp['titel_nl'] = $reportage['titel_nl'];
                $arr_temp['intro_nl'] = $reportage['intro_nl'];
                $arr_temp['afbeelding'] = $reportage['afbeelding'];
                $arr_temp['auteur'] = $reportage['auteur'];
                $arr_temp['id_field'] = $interview['reportage_id'];
                $arr_temp['detail_page'] = $pagina->slug;

                array_push($arr_elements, $arr_temp);
            }

            usort($arr_elements, function($a1, $a2) {
                $v1 = strtotime($a2['datum']);
                $v2 = strtotime($a1['datum']);
                return $v1 - $v2; // $v2 - $v1 to reverse direction
            });

            $arr_recent = array();
            $i = 0;
            foreach ($arr_elements as $element)
            {
                if($i < 5)
                {
                    array_push($arr_recent, $element);
                }
                $i++;
            }

            $this->data['elements'] = $arr_elements;
            $this->data['recent_elements'] = $arr_recent;
        }

        //cyclocross-interviews
        if($this->data['page']->id == '34')
        {
            $this->data['page_title'] = "Cyclocross interviews";

            $this->load->model('interview_m');
            $this->data['id_field'] = 'interview_id';

            $this->data['elements'] = $this->interview_m->get_interviews('2', $_GET['id']);
            $this->data['recent_elements'] = $this->interview_m->get_interviews('2', $_GET['id'], '5');

        }

        //cyclocross-foto
        if($this->data['page']->id == '35')
        {
            $this->data['page_title'] = "Cyclocross foto's";

            $this->load->model('reportage_m');
            $this->data['id_field'] = 'reportage_id';
            
            if($_GET['id'] > 0)
            {
                $this->data['extra_js'] = '
                <script>
                    $(document).ready(function() {
                
                        $(\'.flexslider\').flexslider({
                            animation: "slide"
                          });
                        
                    });
                
                </script>
                ';
            }

            $this->data['elements'] = $this->reportage_m->get_reportages('2', $_GET['id']);
            $this->data['recent_elements'] = $this->reportage_m->get_reportages('2', $_GET['id'], '5');
        }

    }

    private function _page(){
        $this->data['page'] = $this->page_m->get_by_original(array('slug' => (string) $this->uri->segment(1)), TRUE);

        $this->data['left_menu_items'] = $this->page_m->get_pages($this->data['page']->id);

    }

    private function _contact()
    {
        $this->data['page'] = $this->page_m->get_by_original(array('slug' => (string) $this->uri->segment(1)), TRUE);

        if($_POST)
        {
            if(($_POST['middelnaam'] == '') && ($_POST['naam'] != '') && ($_POST['email'] != '') && ($_POST['bericht'] != ''))
            {
                $to      = 'bartbollen@telenet.be';
                $subject = 'Bericht via website';
                $message = '
                Naam: '.$_POST['naam'].'<br>
                E-mail: '.$_POST['email'].'<br>
                Onderwerp: '.$_POST['onderwerp'].'<br><br>
                Bericht: '.htmlspecialchars($_POST['bericht']).'<br>';
                $headers = 'From: info@veerlekennes.be' . "\r\n" .
                    'Reply-To: info@veerlekennes.be' . "\r\n" .
                    'Content-Type: text/html; charset=ISO-8859-1\r\n' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);

                $this->data['succes_messages'] = 'Uw bericht werd succesvol verzonden.';
            }
            else
            {
                $this->data['error_messages'] = 'Uw bericht werd niet verzonden omdat niet alle velden zijn ingevuld.';
            }
        }
    }

    private function _homepage()
    {
        $this->load->model('partnerbox_m');
        $this->load->model('partneritem_m');

        $this->data['partners_left'] = array();
        $this->data['partners_right'] = array();


        $links = $this->partnerbox_m->get_box('1');

        foreach ($links as $item) {
            if ($item->link_id > 0) {
                $item_info = $this->partneritem_m->get($item->item_id);
                array_push($this->data['partners_left'], $item_info);
            }
        }


        $rechts = $this->partnerbox_m->get_box('2');

        foreach ($rechts as $item) {
            if ($item->link_id > 0) {
                $item_info = $this->partneritem_m->get($item->item_id);
                array_push($this->data['partners_right'], $item_info);
            }
        }


    }

    public function sortFunction( $a, $b ) {
        return strtotime($a["datum"]) - strtotime($b["datum"]);
    }

    private function getPlugins()
    {
        $this->load->model('pageplugin_m');
        $this->load->model('sliderbox_m');
        $this->load->model('slideritem_m');

        $plugin_body = '';


        $arr_plugins = $this->pageplugin_m->get_all_page($this->data['page']->id);

        foreach ($arr_plugins as $plugin)
        {
            //SLIDERS
            if($plugin->type_id == '2')
            {
                $slideritems = $this->sliderbox_m->get_box($plugin->plugin_id);

                $plugin_body .= '<div class="section" id="main-slider">';

                foreach ($slideritems as $item)
                {
                    $slideritem = $this->slideritem_m->get($item->item_id);

                    $plugin_body .= '
                        <div class="post feature-post" style="background-image:url(\''.$slideritem->foto.'\'); background-size:cover;">

                        </div><!--/post-->
                    ';
                }

                $plugin_body .= '</div><!-- #main-slider -->';
            }
        }

        return $plugin_body;
    }
}