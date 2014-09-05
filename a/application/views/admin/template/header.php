<?php
	echo '
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <div class="navbar-inner">
           <div class="container-fluid">
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation">
					<i class="fa fa-bars "></i> 
				   </div>
               </div>
				
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>';
				
				$n_query	= $this->db->query( ' SELECT * FROM ' . $this->db->dbprefix('shop_carts') . ' WHERE status = 1 ' );
				$n_item		= $n_query->result();
				
				$this->db->from($this->db->dbprefix('shop_carts'));
				$this->db->where('status', 1);
				$noti = $this->db->count_all_results();
			   
echo '		   <div id="top_menu" class="notify-row">
                   <ul class="nav top-menu">
                       <li class="dropdown" id="header_notification_bar">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-shopping-cart "></i>
                               <span class="badge badge-warning">'.$noti.'</span>
                           </a>
                          <ul class="dropdown-menu extended inbox">
                               <li>
                                   <p>You have '.$noti.' new notifications</p>
                               </li>';
							   
							   foreach ($n_item as $item)
							   {
									$nu_query	= $this->db->query( ' SELECT * FROM ' . $this->db->dbprefix('users') . ' WHERE id = ' .$item->uid );
									$nu_item	= $nu_query->row();
									
									echo '
										<li>
											 <a href="'.$this->base.'admin/shop/cart/'.$item->id.'">
												
												<span class="subject">
												<span class="from">'.$nu_item->name.'</span>
												</span>
												<span class="message"> Item Orders IDR '.number_format($item->total, 0, ',', '.').'</span>
											</a>
										</li>
									';
							   }
                               
                          
echo '     		     			<li>
                                   <a href="#">See all notifications</a>
                               </li>
                           </ul>
                       </li>
                   </ul>
               </div>
			   
	';
?>   
               <!-- END RESPONSIVE MENU TOGGLER -->
               
			    <a class="brand tlogo smooth" href="index.html">
                  <?php echo $this->sconfig->name; ?>
               </a>
			   
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu">
                       <!-- BEGIN SUPPORT -->
                       <li class="dropdown mtop5">

                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                              <i class="fa fa-comments "></i>
                           </a>
                       </li>
                       <li class="dropdown mtop5">
                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                               <i class="fa fa-headphones "></i>
                           </a>
                       </li>
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user "></i>
                               <span class="username"><?php echo $this->name; ?></span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="#"> <i class="fa fa-user"></i> My Profile</a></li>
                               <li><a href="#"> <i class="fa fa-gears"></i>My Settings</a></li>
                               <li><a href="<?php echo $this->base; ?>admin/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>