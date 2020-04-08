<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2"><p> </p></div>
            <div class="col-md-8 mx-auto ">
                <div class="card card-default">
                    <div class="card-header">Login</div>
                        <div class="card-body">
                            <form class="form-horizontal mx-auto" method="POST" :action="nav[0].href">
                                <div class="form-group" >
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <input type="hidden" name="_token" :value="token">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                nav:window.vue_nav,
                authorized:window.auth,
                token:window.token
            };
        }
    }
</script>