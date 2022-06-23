<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4"><?= lang('Auth.loginTitle') ?></h3>
                    </div>
                    <div class="card-body">
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= route_to('login') ?>" method="post">
                            <?= csrf_field() ?>
                            <!-- Inputan Email atau username -->
                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="form-floating mb-3">
                                    <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" />
                                    <label for="inputEmail"><?= lang('Auth.email') ?></label>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <label for="inputEmail"><?= lang('Auth.emailOrUsername') ?></label>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                <label for="inputPassword"><?= lang('Auth.password') ?></label>
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                            <!-- Fitur Remember Me -->
                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                    <label class="form-check-label" for="inputRememberPassword"><?= lang('Auth.rememberMe') ?></label>
                                </div>

                            <?php endif; ?>

                            <?php if ($config->activeResetter) : ?>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                                </div>
                            <?php endif; ?>

                        </form>
                    </div>
                    <?php if ($config->allowRegistration) : ?>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endsection() ?>