<div class="app-navbar flex-shrink-0">			
								<!--begin::Theme mode-->
								<div class="app-navbar-item ms-1 ms-md-4">
									<!--begin::Menu toggle-->
									<a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<i class="ki-duotone ki-night-day theme-light-show fs-1">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
											<span class="path4"></span>
											<span class="path5"></span>
											<span class="path6"></span>
											<span class="path7"></span>
											<span class="path8"></span>
											<span class="path9"></span>
											<span class="path10"></span>
										</i>
										<i class="ki-duotone ki-moon theme-dark-show fs-1">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</a>
									<!--begin::Menu toggle-->
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
										<!--begin::Menu item-->
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-night-day fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
												</span>
												<span class="menu-title">Light</span>
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-moon fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
												<span class="menu-title">Dark</span>
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-screen fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</span>
												<span class="menu-title">System</span>
											</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Theme mode-->
								<!--begin::User menu-->
								<div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
									<!--begin::Menu wrapper-->
									<?php if(isset($_SESSION['pfp'])&& !empty($_SESSION['pfp'])):?>
										<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['pfp']; ?>')">
												<div class="image-input-wrapper w-35px h-35px" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['pfp']; ?>')"></div>
												</div>
									</div>
                            
									<?php else:?>
										<?php if($_SESSION['role'] == "Student"): ?>
											<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										
												<img src="<?php echo URLROOT . "/public/assets/media/youth/default_stupfp.png" ?>" >
											</div>
										<?php elseif($_SESSION['role'] == "Client"):?>
											<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											
											<img src="<?php echo URLROOT . "/public/assets/media/youth/default_cpfp.png" ?>" >
											</div>
										
										<?php elseif($_SESSION['role'] == "Admin"):?>
											<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											
											<img src="https://www.shutterstock.com/image-vector/user-icon-vector-600nw-393536320.jpg" >
											</div>
										<?php endif;?>
									<?php endif; ?>
									
									<!--begin::User account menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
											<?php if(isset($_SESSION['pfp'])&& !empty($_SESSION['pfp'])):?>
												<!--begin::Avatar-->
												<div class="symbol symbol-50px me-5">
												<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['pfp']; ?>')">
												<div class="image-input-wrapper w-50px h-50px" style="background-image: url('<?php echo URLROOT."/public/".$_SESSION['pfp']; ?>')"></div>
												</div>
												</div>
												<?php else:?>
													<?php if($_SESSION['role'] == "Student"): ?>
														<div class="symbol symbol-50px me-5">
															<img src="<?php echo URLROOT . "/public/assets/media/youth/default_stupfp.png" ?>" >
														</div>
													<?php elseif($_SESSION['role'] == "Client"):?>
														<div class="symbol symbol-50px me-5">
															<img src="<?php echo URLROOT . "/public/assets/media/youth/default_cpfp.png" ?>" >
														</div>
													
													<?php endif;?>
													
												<?php endif; ?>
												<!--end::Avatar-->
												<!--begin::Username-->
												<div class="d-flex flex-column">
													<div class="fw-bold d-flex align-items-center fs-5"><?php echo $_SESSION['username']?>
													<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"><?php echo $_SESSION['role'] ?></span></div>
													<text class="fw-semibold text-muted "><?php echo $_SESSION['email'] ?></text>
												</div>
												<!--end::Username-->
											</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<?php if($_SESSION['role'] == "Student"): ?>
												<a href="<?php echo URLROOT; ?>/pages/studentprofile" class="menu-link px-5">My Profile</a>
											<?php elseif($_SESSION['role'] == "Client"): ?>
												<a href="<?php echo URLROOT; ?>/pages/clientprofile" class="menu-link px-5">My Profile</a>
											<?php endif; ?>
										</div>

										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<?php if($_SESSION['role'] == "Student"): ?>
												<a href="<?php echo URLROOT; ?>/activities/view_past" class="menu-link px-5">My Activity</a>
											<?php elseif($_SESSION['role'] == "Client"): ?>
												<a href="<?php echo URLROOT; ?>/activities" class="menu-link px-5">My Activity</a>
											<?php endif; ?>
										</div>

										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<?php if($_SESSION['role'] == "Student"): ?>
													<a href="<?php echo URLROOT; ?>/resumes" class="menu-link px-5">My Resume</a>
											<?php endif; ?>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<?php if($_SESSION['role'] == "Student" || $_SESSION['role'] == "Client") : ?>
													<div class="separator my-2"></div>
											<?php endif; ?>
										
										<!--end::Menu separator-->
										<!--end::Menu item-->
										<!--begin::Menu item-->
										
										<!--begin::Menu item-->
										<div class="menu-item px-5">
										
                                            <?php if(isset($_SESSION['user_id'])) : ?>
                                                    <a href="<?php echo URLROOT; ?>/users/logout" class="menu-link px-5">Log out</a>
                                                <?php else : ?>
                                                    <a href="<?php echo URLROOT; ?>/users/login" class="menu-link px-5">Login</a>
                                                <?php endif; ?>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::User account menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::User menu-->
								<!--begin::Header menu toggle-->
								<div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
									<div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
										<i class="ki-duotone ki-element-4 fs-1">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</div>
								</div>
								<!--end::Header menu toggle-->
								<!--begin::Aside toggle-->
								<!--end::Header menu toggle-->
							</div>