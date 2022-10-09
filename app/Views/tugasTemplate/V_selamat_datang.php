  <?php echo view($navbar); ?>
  <!--
==================================================
Slider Section Start
================================================== -->
  <section id="hero-area">
      <div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                  <div class="block wow fadeInUp" data-wow-delay=".3s">

                      <!-- Slider -->
                      <section class="cd-intro">
                          <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
                              <span>HI <?php $session = session();
                                        echo $session->get('username'); ?>, SELAMAT DATANG</span><br>
                              <span>Silahkan akses fitur</span>
                              <span class="cd-words-wrapper">
                                  <b class="is-visible"></b>
                                  <b>LOGIN & LOGOUT</b>
                                  <b>DATA MAHASISWA</b>
                                  <b>TEMPLATE </b>
                              </span>
                          </h1>
                      </section> <!-- cd-intro -->
                      <!-- /.slider -->
                      <h2 class="wow fadeInUp animated" data-wow-delay=".6s">
                          Website ini menggunakan Template dari <a href="www.themefisher.com">Themefisher</a><br>
                          dengan adanya modifikasi di beberapa elemen
                      </h2>
                      <a class="btn-lines dark light wow fadeInUp animated btn btn-default btn-green hvr-bounce-to-right" data-wow-delay=".9s" href="/dashboard">HOME</a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--
==================================================
About Section Start
================================================== -->
  <section id="about">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-sm-6">
                  <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                      <h2>
                          TENTANG TEMPLATE
                      </h2>
                      <p>
                          Template ini bernama <a href="https://demo.themefisher.com/timer/"><b>Timer Agency Template</b></a>, di download dari <a href="https://themefisher.com" target="themefisher"><b>Themefisher</b></a>
                          dan sudah mengalami beberapa perubahan untuk disesuaikan dengan kebutuhan.
                      </p>
                      <p>
                          Untuk <i>source code</i> lengkapnya dari template ini, bisa kunjungi website Themefisher dan cari kata kunci <a href="https://themefisher.com/products/timer" target="themefisher"><b>Timer</b></a>.
                          Namun untuk <i>source code</i> dari template yang saat ini sedang anda akses, bisa <br>di cek <a href="https://github.com/irfanpertrio/PPL2-Cl" target="github"><b>disini</b></a>.
                      </p>
                  </div>

              </div>
              <div class="col-md-6 col-sm-6">
                  <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                      <img src="images/about/about.jpg" alt="">
                  </div>
              </div>
          </div>
      </div>
  </section> <!-- /#about -->

  <?php echo view($footer); ?>
  <!--/#main-slider-->