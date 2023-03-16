
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="x-apple-disable-message-reformatting">
	<title>Invoice</title>
	<style>
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			padding: 0;
			margin: 0;
			height: 100% !important;
			width: 100% !important;
			font-family: Helvetica, Arial, sans-serif;
			-webkit-font-smoothing: ;
			mso-line-height-rule: exactly;
			color: red;
			text-transform: none;
		}

		.small-text {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
			text-transform: none;
		}

		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
			font-family: Helvetica, Arial, sans-serif;
			-webkit-font-smoothing: ;
			mso-line-height-rule: exactly;
		}

		table {
			border-spacing: 0 !important;
			border-collapse: collapse;
			margin: 0 auto !important;
		}

		table table table {
			table-layout: auto !important;
		}

		img {
			-ms-interpolation-mode: bicubic;
		}

		*[x-apple-data-detectors],
		.x-gmail-data-detectors,
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/*  CLIENT SPECIFIC STYLES  */
		#outlook a {
			padding: 0;
		}

		p,
		a,
		li,
		td,
		blockquote {
			mso-line-height-rule: exactly;
			font-family: Helvetica, Arial, sans-serif;
			-webkit-font-smoothing: ;
			mso-line-height-rule: exactly;
		}

		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img+div {
			display: none !important;
		}

		@media only screen and (min-device-width: 190px) and (max-device-width: 700px) {
			.email-container {
				width: 100% !important;
				max-width: 100% !important;
				min-width: 190px !important;
			}

			.container-full {
				width: 100% !important;
				max-width: 100% !important;
				min-width: 190px !important;
			}

			.outer {
				width: 100% !important;
				max-width: 100% !important;
				min-width: 190px !important;
			}

			.inner {
				width: 90% !important;
				max-width: 90% !important;
			}
		}

		/* Resets */
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		li,
		p {
			padding: 0;
			margin: 0;
			text-transform: none;
		}

		a {
			color: #1b96e8;
		}

		a img {
			border-style: none;
		}

		@media screen and (max-width: 700px) {
			.height-auto {
				height: auto !important;
			}

			/* Padding Resets */
			.reset-pad {
				padding: 0 !important;
			}

			.reset-pad-lr {
				padding-left: 0 !important;
				padding-right: 0 !important;
			}

			.reset-pad-tb {
				padding-top: 0 !important;
				padding-bottom: 0 !important;
			}

			.reset-pad-l {
				padding-left: 0 !important;
			}

			.reset-pad-r {
				padding-right: 0 !important;
			}

			.reset-pad-t {
				padding-top: 0 !important;
			}

			.reset-pad-b {
				padding-bottom: 0 !important;
			}

			.add_border_top_16 {
				border-top: 16px solid #F5F5F5 !important;
			}

			/* Border Resets*/
			.add-border {
				border: 1px solid #cccccc !important;
			}

			.reset-border {
				border: none !important;
			}

			.reset-border-tb {
				border-top: none !important;
				border-bottom: none !important;
			}

			.reset-border-lr {
				border-left: none !important;
				border-right: none !important;
			}

			.reset-border-t {
				border-top: none !important;
			}

			.reset-border-b {
				border-bottom: none !important;
			}

			.reset-border-l {
				border-left: none !important;
			}

			.reset-border-r {
				border-right: none !important;
			}

			.hide {
				display: none !important;
			}

			/* Cereberus Styles */
			.container-full {
				width: 100% !important;
				max-width: 100% !important;
				margin: 0 auto !important;
			}

			.outer {
				width: 100% !important;
				max-width: 100% !important;
				margin: 0 auto !important;
			}

			.container {
				width: 100% !important;
				max-width: 100% !important;
			}

			.inner {
				width: 85% !important;
				max-width: 85% !important;
			}

			.email-container {
				width: 100% !important;
				max-width: 100% !important;
			}

			.fluid {
				width: 100% !important;
				max-width: 100% !important;
				height: auto !important;
				margin-left: auto !important;
				margin-right: auto !important;
			}

			.stack-column,
			.stack-column-center {
				display: block !important;
				width: 100% !important;
				max-width: 100% !important;
				direction: ltr !important;
			}

			.stack-column-center {
				text-align: center !important;
			}

			.center-on-narrow {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
				width: auto !important;
			}

			table.center-on-narrow {
				display: inline-block !important;
			}

			.height-auto {
				height: auto !important;
			}

			.image_logo {
				max-width: 155px !important;
				height: auto !important;
				margin-left: auto !important;
				margin-right: auto !important;
			}

			.left-on-narrow {
				text-align: left !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
				width: auto !important;
			}

			table.left-on-narrow {
				display: block !important;
			}

			.reduce_height_8 {
				max-height: 8px !important;
				height: 8px !important;
			}

			.reduce_height_5 {
				max-height: 5px !important;
				height: 5px !important;
			}

			.center_text {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
				width: auto !important;
			}

			.menu_text {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
				width: auto !important;
				color: #000000 !important;
				background-color: #FFFFFF;
				padding: 4px 0px;
			}

			.menu_space {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
				width: auto !important;
				padding: 0px;
				font-size: 5px !important;
				line-height: 5px !important;
			}

			.menu_text_2 {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
				width: auto !important;
				color: #FFFFFF !important;
				background-color: #3a3a3a;
				padding: 4px 0px;
			}
		}



		/* Template Specific Mobile Styles */

		@media screen and (max-width: 700px) {
			.reduce-pad-b-20 {
				padding-bottom: 20px !important
			}

			.reduce-pad-menu-5 {
				padding-top: 5px !important;
				padding-bottom: 5px !important;
			}

			.reduce-headline {
				font-size: 22px !important;
				line-height: 24px !important;
				font-weight: 400 !important;
			}

			.reduce-sub-head {
				font-size: 16px !important;
				line-height: 20px !important;
			}

			.add-pad-tb-20 {
				padding-top: 20px !important;
				padding-bottom: 20px !important;
			}

			.add-pad-tb-10 {
				padding-top: 10px !important;
				padding-bottom: 10px !important;
			}

			.add-pad-b-10 {
				padding-bottom: 10px !important;
			}

			.reduce-pad-30 {
				padding-left: 30px !important;
				padding-right: 30px !important;
				padding-top: 40px !important;
				padding-bottom: 40px !important;
			}

			.pad_reduce_1 {
				padding-left: 1px !important;
				padding-right: 1px !important;
				padding-top: 1px !important;
				padding-bottom: 1px !important;
				padding: 1px !important;
			}

			.height_30 {
				height: 35px !important;
				font-size: 30px !important;
				line-height: 30px !important;
			}
		}
	</style>
</head>

<body marginwidth="0" marginheight="0"
	style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"
	offset="0" topmargin="0" leftmargin="0">
	<table style="width: 100%; max-width: 100%;" class="container-full" data-module="Module_10"
		data-bgcolor="body_background" width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>
					<div
						style="max-width:700px;border-left: 2px solid #F7931E; border-right: 2px solid #F7931E; margin: 0 auto;">
						<!--[if (gte mso 9)|(IE)]>
<table width="700" align="center" cellpadding="0" cellspacing="0" border="0" style="width:700px;">
<tr>
<td>
<![endif]-->
						<table style="margin:0 auto; width: 100%; max-width: 700px;" class="outer"
							data-bgcolor="event_Inner_bg_10" width="100%" cellspacing="0" cellpadding="0" border="0"
							align="center">
							<tbody>
								<tr>
									<td style="padding: 0px;" align="center">
										<!--[if (gte mso 9)|(IE)]>
<table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="width:600px;">
<tr>
<td>
<![endif]-->
										<!-- START Inner -->
										<table style="width: 100%; max-width: 600px;" class="inner" width="100%"
											cellspacing="0" cellpadding="0" border="0" align="center">
											<tbody>
												<tr>
													<td style="font-size: 20px; line-height: 20px;" height="20">&nbsp;
													</td>
												</tr>
												<tr>
													<td>
														<table width="100%" cellspacing="0" cellpadding="0" border="0"
															align="center" class="">
															<tbody>
																<tr>
																	<td align="center">
																		<table width="100%" cellspacing="0"
																			cellpadding="0" border="0" align="center"
																			class="">
																			<tbody>
																				<tr>
																					<td class="stack-column" width="200"
																						valign="top" align="left">
																						<table style="width: 200px;"
																							class="email-container"
																							width="200" cellspacing="0"
																							cellpadding="0" border="0"
																							align="left">
																							<tbody>
																								<tr>
																									<td style="padding: 0px;"
																										align="center">
																										<table
																											width="100%"
																											cellspacing="0"
																											cellpadding="0"
																											border="0"
																											class="">
																											<!-- Content -->
																											<tbody>
																												<tr>
																													<td style="font-family: Helvetica, Arial, sans-serif; font-weight:normal; font-size:18px; line-height:28px; letter-spacing: 1px; text-transform: uppercase;"
																														class="center_text"
																														data-color="event_2col5_text"
																														data-size="event_2col5_text"
																														data-min="3"
																														data-max="50"
																														align="left">
																														<img src="https://hometalab.com/front_assets/img/logo/logo-2.png"
																															width="200" style="width: 200px" />
																													</td>
																												</tr>
																												<!-- End Content -->

																											</tbody>
																										</table>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																					<!-- End Left Column -->

																					<!-- Right Column -->

																					<td class="stack-column" width="200"
																						valign="top" align="left">
																						<table style="width: 200px;"
																							class="email-container"
																							width="220" cellspacing="0"
																							cellpadding="0" border="0"
																							align="right">
																							<tbody>
																								<tr>
																									<td style="font-size: 20px; line-height: 20px;"
																										height="20">
																										&nbsp;
																									</td>
																								</tr>
																								<tr>
																									<td style="padding: 0px;"
																										align="center">
																										<table
																											width="100%"
																											cellspacing="0"
																											cellpadding="0"
																											border="0"
																											class="">
																											<!-- Button -->

																											<tbody>

																												<!-- END Button -->

																											</tbody>
																										</table>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>

																					<td class="stack-column" width="200"
																						valign="top" align="left">
																						<table style="width: 200px;"
																							class="email-container"
																							width="220" cellspacing="0"
																							cellpadding="0" border="0"
																							align="right">
																							<tbody>
																								<tr>
																									<td style="font-size: 20px; line-height: 20px;"
																										height="20">
																										&nbsp;
																									</td>
																								</tr>
																								<tr>
																									<td style="padding: 0px;"
																										align="center">
																										<table
																											width="100%"
																											cellspacing="0"
																											cellpadding="0"
																											border="0"
																											class="">
																											<!-- Button -->

																											<tbody>
																												<tr>
																													<td class="center-on-narrow"
																														align="right">
																														<table
																															class="center-on-narrow"
																															cellspacing="0"
																															cellpadding="0"
																															border="0"
																															align="right">
																															<tbody>
																																<tr>
																																	<td
																																		align="right">
																																		<p
																																			style="color: #000;">
																																			<!-- 647-444-123 -->
																																			<!-- <br/> -->
																																			<a href="mailto:info@hometalab.com"
																																				style="color: #000;">info@hometalab.com</a>
																																		</p>
																																	</td>
																																</tr>
																															</tbody>
																														</table>
																													</td>
																												</tr>
																												<!-- END Button -->

																											</tbody>
																										</table>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																					<!-- End Right Column -->

																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<!-- END 2 Column -->
															</tbody>
														</table>
													</td>
												</tr>

												<tr>
													<td style="font-size: 40px; line-height: 40px;" height="40">
														&nbsp;
													</td>
												</tr>
											</tbody>
										</table>
										<!-- END Inner -->
										<!--[if (gte mso 9)|(IE)]>
							</td>
						</tr>
					</table> <![endif]-->
									</td>
								</tr>
							</tbody>
						</table>
						<!--[if (gte mso 9)|(IE)]>
					</td>
					</tr>
					</table> <![endif]-->
					</div>
				</td>
			</tr>
		</tbody>
	</table>

	<table style="width: 100%; max-width: 100%;" class="container-full" data-module="Module_10"
		data-bgcolor="body_background" width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>
					<div
						style="max-width:700px; border-left: 2px solid #F7931E; border-right: 2px solid #F7931E; margin: 0 auto;">
						<!--[if (gte mso 9)|(IE)]>
<table width="700" align="center" cellpadding="0" cellspacing="0" border="0" style="width:700px;">
<tr>
<td>
<![endif]-->
						<!-- START Inner -->
						<table style="width: 100%; max-width: 600px;" class="inner" width="100%" cellspacing="0"
							cellpadding="0" border="0">
							<tbody>
								<tr>
									<td style="font-size: 20px; line-height: 20px;" height="20">&nbsp;</td>
								</tr>

								<tr>
									<td style="font-size: 40px; line-height: 40px;" height="40">
										&nbsp;
									</td>
								</tr>
							</tbody>
						</table>
						<!-- END Inner -->
						<!--[if (gte mso 9)|(IE)]>
							</td>
						</tr>
					</table> <![endif]-->
					</div>
				</td>
			</tr>
		</tbody>
	</table>


	<table style="width: 100%; max-width: 100%;" class="container-full" data-module="Module_10"
		data-bgcolor="body_background" width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>
					<div style="max-width:700px; border-left: 2px solid #F7931E; border-right: 2px solid #F7931E; margin: 0 auto;">
						<table style="width: 100%;">
							<div style="width: 100%; text-align: center;">
								<h1 style="text-align: center; color: #2e3192;">
									HI {{ $username }}
								</h1>
								<p style="color: #000; margin-top: 20px; margin-bottom: 20px;">Thank you for joining Home Talab</p>
								<h3 style="color: #000;">Your OTP is</h3>
								<h1 style="color: #2e3192; margin-bottom: 20px; margin-top: 20px; letter-spacing: 5px; font-size: 35px;">{{ $verification_code }}</h1>
							</div>

						</table>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
	</td>
	</tr>
	</tbody>
	</table>




	<table role="presentation" style="width: 100%; max-width: 100%;" class="container-full"
		data-module="Footer_module_3" data-bgcolor="body_background"
		data-thumb="http://www.emailcodermd.com/premiume/Allmail/data_thumb/agency/footer_3.jpg" width="100%"
		cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>

					<div
						style="max-width:700px;border-left: 2px solid #F7931E; border-right: 2px solid #F7931E; margin: 0 auto;">
						<!--[if (gte mso 9)|(IE)]>
		<table width="700" align="center" cellpadding="0" cellspacing="0" border="0" style="width:700px;"><tr><td>
		<![endif]-->


						<table role="presentation" style="margin:0 auto; width: 100%; max-width: 700px;" class="outer"
							data-bgcolor="Footer_inner_bg_3" width="100%" cellspacing="0" cellpadding="0" border="0"
							bgcolor="#2D2C2C" align="center">
							<tbody>
								<tr>
									<td style="padding: 0px;" align="center">

										<!--[if (gte mso 9)|(IE)]>
				<table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr><td>
				<![endif]-->

										<!-- START Inner -->
										<table role="presentation" style="width: 100%; max-width: 600px;" class="inner"
											width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

											<tbody>
												<tr>
													<td style="font-size: 25px; line-height: 25px;" height="25">&nbsp;
													</td>
												</tr>

												<tr>
													<td>
														<table role="presentation" width="100%" cellspacing="0"
															cellpadding="0" border="0" align="center" class="">

															<!-- Social area -->
															<tbody>
																<tr>
																	<td align="center">
																		<table role="presentation" class="social_area"
																			style="width: 200px; max-width: 200px;"
																			width="240" cellspacing="0" cellpadding="0"
																			border="0" align="center">
																			<tbody>
																				<tr>
																					<!-- Social icon -->
																					<td align="center">
																						<a href="https://www.facebook.com/hometalab/" target="_blank">
																							<img style="display:block; line-height:0px; font-size:0px; border:0px; width: 40px"
																								src="https://img.icons8.com/color/50/facebook-new.png"
																								class="social_image"
																								alt="40x40" width="40"
																								height="40">
																						</a>
																					</td>
																					<!-- End Social icon -->

																					<td width="5"></td>

																					<!-- Social icon -->
																					<td align="center">
																						<a href="https://www.instagram.com/hometalab/" target="_blank">
																							<img style="display:block; line-height:0px; font-size:0px; border:0px; width: 40px"
																								src="https://img.icons8.com/color/512/instagram-new.png"
																								class="social_image"
																								alt="40x40" width="40"
																								height="40">
																						</a>
																					</td>
																					<!-- End Social icon -->

																					<td width="5"></td>
																					<!-- Social icon -->
																					<td align="center">
																						<a href="https://www.linkedin.com/company/hometalab/" target="_blank">
																							<img style="display:block; line-height:0px; font-size:0px; border:0px; width: 40px" src="https://img.icons8.com/color/512/linkedin.png" class="social_image" alt="40x40" width="40" height="40">
																						</a>
																					</td>
																					<!-- End Social icon -->

																					<td width="5">
																					</td>

																					<!-- Social icon -->
																					<td align="center">
																					</td>
																					<!-- End Social icon -->
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<!-- End Social area -->

															</tbody>
														</table>
													</td>
												</tr>

												<tr>
													<td style="font-size: 25px; line-height: 25px;" height="25">&nbsp;
													</td>
												</tr>

												<!-- border bg -->
												<tr>
													<td align="center">
														<table role="presentation" width="100%" cellspacing="0"
															cellpadding="0" border="0" align="center" class="">
															<!-- border bg -->
															<tbody>
																<tr>
																	<td align="center">
																		<table
																			style="border-collapse:collapse; border-radius:0px; width: 100%; max-width: 600px; height: 1px; max-height: 1px;"
																			class="email-container" width="100%"
																			cellspacing="0" cellpadding="0" border="0"
																			align="center">
																			<tbody>
																				<tr>
																					<td style="height: 1px; max-height: 1px;"
																						align="center">
																						<table role="presentation"
																							width="100%" cellspacing="0"
																							cellpadding="0" border="0"
																							align="center" class="">
																							<tbody>
																								<tr>
																									<td style="font-size: 1px; line-height: 1px; height: 1px; max-height: 1px;"
																										data-bgcolor="Footer_border"
																										bgcolor="#404040"
																										height="1">
																										&nbsp;</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<!-- End border bg -->

															</tbody>
														</table>
													</td>
												</tr>
												<!-- End border bg -->

											</tbody>
										</table>
										<!-- END Inner -->

										<!--[if (gte mso 9)|(IE)]>
					</td></tr></table>
					<![endif]-->
									</td>
								</tr>
							</tbody>
						</table>

						<!--[if (gte mso 9)|(IE)]>
		</td></tr></table>
		<![endif]-->
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table role="presentation" style="width: 100%; max-width: 100%;" class="container-full"
		data-module="Footer_module_5" data-bgcolor="body_background" width="100%"
		cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>

					<div
						style="max-width:700px;border-left: 2px solid #F7931E; border-right: 2px solid #F7931E; margin: 0 auto;">
						<!--[if (gte mso 9)|(IE)]>
		<table width="700" align="center" cellpadding="0" cellspacing="0" border="0" style="width:700px;"><tr><td>
		<![endif]-->

						<table role="presentation" style="margin:0 auto; width: 100%; max-width: 700px;" class="outer"
							data-bgcolor="Footer_inner_bg_5" width="100%" cellspacing="0" cellpadding="0" border="0"
							bgcolor="#2D2C2C" align="center">
							<tbody>
								<tr>
									<td style="padding: 0px;" align="center">
										<!--[if (gte mso 9)|(IE)]>
				<table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr><td>
				<![endif]-->

										<!-- START Inner -->
										<table role="presentation" style="width: 100%; max-width: 600px;" class="inner"
											width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

											<tbody>
												<tr>
													<td style="font-size: 18px; line-height: 18px;" height="20">&nbsp;
													</td>
												</tr>

												<tr>
													<td>
														<table role="presentation" width="100%" cellspacing="0"
															cellpadding="0" border="0" align="center" class="">

															<!-- Content -->
															<tbody>
																<tr>
																	<td style="font-family: Helvetica, Arial, sans-serif; font-weight:normal; color:#878787; font-size:14px; line-height:22px; letter-spacing: 0.2px; text-transform: none;"
																		class="center_text"
																		data-color="Footer_copyright"
																		data-size="Footer_copyright" data-min="3"
																		data-max="40" align="center">
																		Copyright &copy; 2023 All right reserved. 
																		&nbsp;
																	</td>
																</tr>
																<!-- End Content -->

															</tbody>
														</table>
													</td>
												</tr>

												<tr>
													<td style="font-size: 18px; line-height: 18px;" height="21">&nbsp;
													</td>
												</tr>

												<!-- border bg -->
												<tr>
													<td align="center">
														<table role="presentation" width="100%" cellspacing="0"
															cellpadding="0" border="0" align="center" class="">
															<!-- border bg -->
															<tbody>
																<tr>
																	<td align="center">
																		<table
																			style="border-collapse:collapse; border-radius:0px; width: 100%; max-width: 600px; height: 1px; max-height: 1px;"
																			class="email-container" width="100%"
																			cellspacing="0" cellpadding="0" border="0"
																			align="center">
																			<tbody>
																				<tr>
																					<td style="height: 1px; max-height: 1px;"
																						align="center">
																						<table role="presentation"
																							width="100%" cellspacing="0"
																							cellpadding="0" border="0"
																							align="center" class="">
																							<tbody>
																								<tr>
																									<td style="font-size: 1px; line-height: 1px; height: 1px; max-height: 1px;"
																										data-bgcolor="Footer_border"
																										bgcolor="#404040"
																										height="1">
																										&nbsp;</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<!-- End border bg -->

															</tbody>
														</table>
													</td>
												</tr>
												<!-- End border bg -->

											</tbody>
										</table>
										<!-- END Inner -->

										<!--[if (gte mso 9)|(IE)]>
					</td></tr></table>
				<![endif]-->

									</td>
								</tr>
							</tbody>
						</table>

						<!--[if (gte mso 9)|(IE)]>
		</td></tr></table>
		<![endif]-->
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>