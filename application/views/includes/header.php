<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>6S Audit </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url('') ?>assets/img/Dlogo.png' />
  <script src="<?php echo base_url('') ?>assets/js/jquery.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/components.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/Select/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/notifications/toastr/toastr.css">


</head>
<style>

</style>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">

                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <?php
          $ISHOD = $this->session->userdata('ISHOD');
          if ($ISHOD == 1) {
          ?>
            <li class="dropdown dropdown-list-toggle">
              <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="bell" class="bell"></i>
                <span class="badge headerBadge1">
                  <?php


                  if (isset($NotificationCounter)) {
                    foreach ($NotificationCounter as $keys) {
                      $GMNo = $keys['GMNo'];
                      if ($GMNo == 0) {
                        echo '';
                      } else {
                        echo $GMNo;
                      }
                    }
                  }
                  ?>

                </span> </a>
              <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                  Notifications
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                  <?php
                  foreach ($Notification as $keys) {
                    $Type = $keys['Type'];
                    if ($Type == 'General') {
                  ?>
                      <a href="<?php echo base_url('ViewDemands') ?>" class="dropdown-item dropdown-item-unread">
                      <?php
                    } elseif ($Type == 'Raw Material') {
                      ?>
                        <a href="<?php echo base_url('RawDemands') ?>" class="dropdown-item dropdown-item-unread">
                        <?php

                      }

                        ?>
                        <span class="dropdown-item-icon bg-primary text-white">
                          <i class="fas fa-bell"> </i>
                        </span> <span class="dropdown-item-desc"> <?php
                                                                  echo $keys['UserName'];
                                                                  ?> Generated New Demand For
                          <?php
                          echo $keys['L4Name'];
                          ?> Qty:
                          <?php
                          echo round($keys['RequiredQty']);
                          ?>
                        </span>
                        </a>
                      <?php

                    }
                      ?>

                </div>
                <div class="dropdown-footer text-center">
                  <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </li>
          <?php

          }

          ?>


          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" style="color:black;">
              <i class="far
										fa-user"></i> <?php echo $this->session->userdata('user_name') ?></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
            <div class="dropdown-title">
              <h3 id="name1" style="font-size: 10px;"> </h3>
            </div>
              <!-- <a href="<?php echo base_url('Profile') ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> -->
              <div class="dropdown-divider"></div>
              <a onclick="logout()" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <style>
        a {
          text-decoration: none;
          color: #202020;
        }

        a:hover {
          text-decoration: none;
          color: #202020;
        }
      </style>
      <script>
        document.addEventListener('DOMContentLoaded', function(){
          document.getElementById("name1").textContent =`${sessionStorage.getItem('user_name')}`
        })
      function logout(){
  sessionStorage.removeItem('Login_id')
  sessionStorage.removeItem('user_name')
  sessionStorage.removeItem('deptid')
  sessionStorage.removeItem('deptname')
  sessionStorage.removeItem('sect_id')
  sessionStorage.removeItem('sectname')
  sessionStorage.removeItem('rights')
  sessionStorage.removeItem('subrights')
  window.location.href = '<?php echo base_url("loginController"); ?>';
  }</script>
      <!-- <script>
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6130a893d6e7610a49b34437/1fej150ks';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

        </script> -->