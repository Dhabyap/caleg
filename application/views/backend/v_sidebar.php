<ul class="menu accordion-menu">
                        <li class="<?= $dahsboard; ?>"><a href="<?php echo site_url('backend/dashboard');?>" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Dashboard</p></a></li>
                        <!-- <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-pin"></span><p>Berita</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo site_url('backend/post/add_new');?>">Tambah Berita</a></li>
                                <li><a href="<?php echo site_url('backend/post');?>">List Berita</a></li>
                                <li><a href="<?php echo site_url('backend/category');?>">Kategori</a></li>
                                <li><a href="<?php echo site_url('backend/tag');?>">Tag</a></li>
                            </ul>
                        </li> -->
                        <li class="<?= $relawan; ?>"><a href="<?php echo site_url('backend/inbox');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Relawan</p></a></li>
                        <li class="<?= $krisan; ?>"><a href="<?php echo site_url('backend/inbox/krisan');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Kritik dan Saran</p></a></li>
                        <li class="<?= $pendukung; ?>"><a href="<?php echo site_url('backend/inbox/pendukung');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Pendukung</p></a></li>
                        <li class="<?= $suara; ?>"><a href="<?php echo site_url('backend/inbox/suara');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Perolehan Suara</p></a></li>
                        <li class="<?= $visi; ?>"><a href="<?php echo site_url('backend/testimonial');?>" class="waves-effect waves-button"><span class="menu-icon icon-like"></span><p>Visi $ Misi</p></a></li>
                        <?php if($this->session->userdata('access')=='1'):?>
                        <li class="<?= $user; ?>" ><a href="<?php echo site_url('backend/users');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Pengguna</p></a></li>
                        <li class="droplink"><a href="<?php echo site_url('backend/settings');?>" class="waves-effect waves-button"><span class="menu-icon icon-settings"></span><p>Pengaturan</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                
                                <li><a href="<?php echo site_url('backend/settings');?>">Basic</a></li>
                                <li><a href="<?php echo site_url('backend/home_setting');?>">Home</a></li>
                                <li><a href="<?php echo site_url('backend/about_setting');?>">Tentang</a></li>
                                <li><a href="<?php echo site_url('backend/navbar');?>">Navbar</a></li>
                            </ul>
                        </li>
                        <?php else:?>
                        <?php endif;?>
                        <li><a href="<?php echo site_url('logout');?>" class="waves-effect waves-button"><span class="menu-icon icon-logout"></span><p>Keluar</p></a></li>
                        
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->