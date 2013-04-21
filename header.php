<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php if(!empty($_SESSION['logged']) && !empty($_SESSION['c_user'])){
            switch($_SESSION['c_user']->privilege) {
                case 0:
                    echo "<title>Admin Pannel ";
                    switch($_GET['module']){
                        case "collab":
                            switch ($_GET['option']){
                                case "add":
                                    echo "| Ajouter Collaborateur";
                                    break;
                                case "list":
                                    echo "| Liste Collaborateurs";
                                    break;
                                case "edit":
                                    echo "| Editer Collaborateur";
                                    break;
                                default :
                                    break;
                            }
                            break;
                        case "manager":
                            switch ($_GET['option']){
                                case "add":
                                    echo "| Ajouter Manager";
                                    break;
                                case "list":
                                    echo "| Liste Managers";
                                    break;
                                case "edit":
                                    echo "| Editer Manager";
                                    break;
                                default :
                                    break;
                            }
                            break;
                        case "competence":
                            switch ($_GET['option']){
                                case "add":
                                    echo "| Ajouter Competence";
                                    break;
                                case "list":
                                    echo "| Liste Competences";
                                    break;
                                case "edit":
                                    echo "| Editer Competence";
                                    break;
                                case "list_cat":
                                    echo "| Liste Categories Competences";
                                    break;
                                case "edit_cat":
                                    echo "| Editer Categorie Competence";
                                    break;
                                default :
                                    break;
                            }
                            break;
                        case "service":
                            switch ($_GET['option']){
                                case "add":
                                    echo "| Ajouter Service";
                                    break;
                                case "list":
                                    echo "| Liste Service";
                                    break;
                                case "edit":
                                    echo "| Editer Service";
                                    break;
                                default :
                                    break;
                            }
                            break;
                        default :
                            break;
                    }
                    echo "</title>";
                    break;
                case 1:
                    echo "<title>Manager Pannel</title>";
                    break;
                case 2:
                    echo "<title>Collab Pannel</title>";
                    break;
                default :
                    include 'logout.php';
                    echo "<title>Authentification</title>";
                    break;
            }
        } else {
            echo "<title>Authentification</title>";
        }
        ?>
    
	<link rel="stylesheet" href="css/screen.css"  media="screen"  />

        <link rel="stylesheet" type="text/css" href="css/jNotify/jNotify.jquery.css" media="screen" />
	<!--  jquery core -->
        <script type="text/javascript"  src="js/jquery/jquery-1.4.1.min.js" ></script>

	<!-- Custom jquery scripts -->
        <script type="text/javascript"  src="js/jquery/custom_jquery.js" ></script>

        <script type="text/javascript"  src="js/jquery/jquery.cookie.js" ></script>
        
	<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
        <script type="text/javascript"  src="js/jquery/jquery.pngFix.pack.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            $(document).pngFix( );
            });
	</script>
        <link rel="stylesheet" href="css/layout.css" media="screen" />

        <script type="text/javascript"  src="js/hideshow.js" ></script>
        <script type="text/javascript"  src="js/jquery.tablesorter.min.js"></script>
        <script type="text/javascript"  src="js/jquery.equalHeight.js"></script>
        <script type="text/javascript" src="js/jNotify/jNotify.jquery.js"></script>
        
        <script type="text/javascript" >
            $(document).ready(function()
            {
              $(".tablesorter").tablesorter();
             }
            );
            $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                    $("ul.tabs li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content").hide(); //Hide all tab content

                    var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active ID content
                    return false;
            });

        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>
    <?php 
    if(!empty($_SESSION['logged']) && !empty($_SESSION['c_user'])) {
        if($_SESSION['c_user']->privilege == 0 || $_SESSION['c_user']->privilege == 1 || $_SESSION['c_user']->privilege == 2) {
    ?>
        
        <script type="text/javascript" src="dash/js/jquery/ui.core.js" ></script>
        <script type="text/javascript" src="dash/js/jquery/ui.checkbox.js" ></script>
        <script type="text/javascript" src="dash/js/jquery/jquery.bind.js"></script>
        <script type="text/javascript">

        $(function(){
                $('input').checkBox();
                $('#toggle-all').click(function(){
                $('#toggle-all').toggleClass('toggle-checked');
                $('#mainform input[type=checkbox]').checkBox('toggle');
                return false;
                });
        });
        </script>


        <![if !IE 7]>

        <!--  styled select box script version 1 -->
        <script type="text/javascript" src="dash/js/jquery/jquery.selectbox-0.5.js" ></script>
        <script type="text/javascript">
        $(document).ready(function() {
                $('.styledselect').selectbox({ inputClass: "selectbox_styled" });
        });
        </script>


        <![endif]>


        <!--  styled select box script version 2 -->
        <script type="text/javascript" src="dash/js/jquery/jquery.selectbox-0.5_style_2.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
                $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
                $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
        });
        </script>

        <!--  styled select box script version 3 -->
        <script type="text/javascript" src="dash/js/jquery/jquery.selectbox-0.5_style_2.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
                $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
        });
        </script>

        <!--  date picker script -->
        <link rel="stylesheet" href="dash/css/datePicker.css" />
        <script type="text/javascript" src="dash/js/jquery/date.js" ></script>
        <script type="text/javascript" src="dash/js/jquery/jquery.datePicker.js" ></script>
        <script type="text/javascript" >
            $(function(){

            // initialise the "Select date" link
                $('#date-pick')
                        .datePicker(
                                // associate the link with a date picker
                                {
                                        createButton:false,
                                        startDate:'01/01/2013',
                                        endDate:'31/12/2020'
                                }
                        ).bind(
                                // when the link is clicked display the date picker
                                'click',
                                function()
                                {
                                        updateSelects($(this).dpGetSelected()[0]);
                                        $(this).dpDisplay();
                                        return false;
                                }
                        ).bind(
                                // when a date is selected update the SELECTs
                                'dateSelected',
                                function(e, selectedDate, $td, state)
                                {
                                        updateSelects(selectedDate);
                                }
                        ).bind(
                                'dpClosed',
                                function(e, selected)
                                {
                                        updateSelects(selected[0]);
                                }
                        );


                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d').trigger('change');
            });
        </script>
    <?php }} ?>
</head>
<body>