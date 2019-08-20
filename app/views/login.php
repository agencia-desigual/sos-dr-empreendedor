<?php $this->view("includes/header"); ?>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-md-6 div-login">
                <form id="formLogin">
                    <div class="form-group">
                        <label style="font-size: 18px;font-weight: bold;color: #27448B;">EMAIL</label>
                        <input style="border-radius: 25px;" name="email" type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px;font-weight: bold;color: #27448B;">SENHA</label>
                        <input style="border-radius: 25px;" name="senha" type="password" class="form-control" id="loginSenha">
                    </div>
                    <br>
                    <button id="btnLogin" style="background-color: #45a3e6; width: 100%;border-radius: 25px;" type="submit" class="btn btn-primary">ENTRAR</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

<?php $this->view("includes/footer"); ?>