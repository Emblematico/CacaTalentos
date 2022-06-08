<?php
session_start();
require_once "global.php";
if(isset($_SESSION["aluno"])) {
    header("Location: register.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cadastro | Caça-Talentos</title>
        <link rel="shortcut icon" href="./Frame.ico">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
        <link rel="preload" href="../front-dashboard-v2.0/assets/css/theme.min.css" as="style" data-hs-appearance="default">
        <link rel="preload" href="../front-dashboard-v2.0/assets/css/theme-dark.min.css" as="style" data-hs-appearance="dark">
        <link rel="preload" href="../assets/styles/custom.css" as="style">
        <link rel="stylesheet" href="../front-dashboard-v2.0/assets/css/vendor.min.css">
        <link rel="stylesheet" href="../front-dashboard-v2.0/assets/css/theme.min.css">
        <script src="../front-dashboard-v2.0/assets/js/hs.theme-appearance.js"></script>
        <link rel="stylesheet" href="../assets/styles/custom.css">
    </head>
    <body>
        <main id="content" role="main" class="main">
            <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url(../front-dashboard-v2.0/assets/svg/components/card-6.svg);">
                <!-- Shape -->
                <div class="shape shape-bottom zi-1">
                  <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                    <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
                  </svg>
                </div>
                <!-- End Shape -->
              </div>
            <div class="container py-5 py-sm-7">
                <a class="d-flex justify-content-center mb-5" href="./index.html">
                    <img class="zi-2" src="../front-dashboard-v2.0/assets/svg/logos/logo.svg" alt="Image Description" style="width: 8rem;">
                </a>
                <div class="mx-auto" style="max-width: 30rem;">
                    <div class="card card-lg mb-5">
                        <div class="card-body">
                        <?php
    try {
        $aluno = new Aluno();
        $lista = $aluno->listar();
    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>
                            <form  action="cadastro_aluno.php" method="post">
                                <div class="text-center">
                                    <div class="mb-5">
                                        <h1 class="display-5">Criar uma conta</h1>
                                        <p>Já tem uma conta? <a class="link" href="./login.php">Entre aqui</a></p>
                                    </div>
                                    
                                    <input type="radio" name="user-type" value="aluno"   id="user-type-aluno"   style="display:none" checked>
                                    <input type="radio" name="user-type" value="empresa" id="user-type-empresa" style="display:none">
                                    <span class="d-block text-muted mb-1">Eu sou</span>
                                    <div class="mb-4">
                                        <ul class="nav nav-segment" role="tablist">
                                            <li class="nav-item">
                                                <label data-bs-target="#form-aluno" role="tab" aria-controls="form-aluno" for="user-type-aluno" class="nav-link active" data-bs-toggle="pill" style="cursor:pointer">Aluno</label>
                                            </li>
                                            <li class="nav-item">
                                                <label data-bs-target="#form-empresa" role="tab" aria-controls="form-empresa" for="user-type-empresa" class="nav-link" data-bs-toggle="pill" style="cursor:pointer">Empresa</a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="form-aluno" role="tabpanel" aria-labelledby="form-aluno">
                                        <div class="mb-4">
                                            <label class="form-label" for="nome">Nome</label>
                                            <input type="text" class="form-control form-control-lg" name="nome" id="nome">
                                            <span class="invalid-feedback">Por favor, insira o nome corretamente.</span>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="cpf">CPF</label>
                                            <input type="text" class="form-control form-control-lg" name="cpf" id="cpf" data-hs-mask-options='{"mask": "000.000.000-00"}'>
                                            <span class="invalid-feedback">Por favor, insira o CPF corretamente.</span>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="sexo">Sexo</label>
                                            <input type="text" class="form-control form-control-lg" name="sexo" id="sexo">
                                            <span class="invalid-feedback">Por favor, insira o Sexo corretamente.</span>
                                            </select>
                                            <span class="invalid-feedback">Por favor, selecione o sexo.</span>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-7">
                                                <label class="form-label" for="curso">Curso</label>
                                                <input type="text" class="form-control form-control-lg" name="curso" id="curso">
                                                <span class="invalid-feedback">Por favor, insira o curso corretamente.</span>
                                            </div>
                                            <div class="col-5">
                                                <label class="form-label" for="semestre">Semestre</label>
                                                <div class="quantity-counter">
                                                    <div class="js-quantity-counter row align-items-center">
                                                        <div class="col">
                                                            <input class="js-result form-control form-control-quantity-counter" type="number" name="semestre" value="1">
                                                        </div>
                                                        <div class="col-auto">
                                                            <a class="js-minus btn btn-outline-secondary btn-xs btn-icon rounded-circle" href="javascript:;">
                                                                <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z" fill="currentColor"/>
                                                                </svg>
                                                            </a>
                                                            <a class="js-plus btn btn-outline-secondary btn-xs btn-icon rounded-circle" href="javascript:;">
                                                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z" fill="currentColor"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="invalid-feedback">Por favor, insira o semestre corretamente.</span>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="ra">RA</label>
                                            <input type="number" class="form-control form-control-lg" name="ra" id="ra" data-hs-mask-options='{"mask": "0000000000000"}'>
                                            <span class="invalid-feedback">Por favor, insira o RA corretamente.</span>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="form-empresa" role="tabpanel" aria-labelledby="form-empresa">
                                        <div class="mb-4">
                                            <label class="form-label" for="razao-social">Razão Social</label>
                                            <input type="text" class="form-control form-control-lg" name="razao-social" id="razao-social">
                                            <span class="invalid-feedback">Por favor, insira a razão social corretamente.</span>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="nome-fantasia">Nome Fantasia</label>
                                            <input type="text" class="form-control form-control-lg" name="nome-fantasia" id="nome-fantasia">
                                            <span class="invalid-feedback">Por favor, insira o nome fantasia corretamente.</span>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-5">
                                                <label class="form-label" for="estado">Estado</label>
                                                <select class="js-select form-select form-control" name="estado" id="estado" autocomplete="off" data-hs-tom-select-options='{ "placeholder":"Buscar" }'>
                                                    <option value="AC">Acre</option>
                                                    <option value="AL">Alagoas</option>
                                                    <option value="AP">Amapá</option>
                                                    <option value="AM">Amazonas</option>
                                                    <option value="BA">Bahia</option>
                                                    <option value="CE">Ceará</option>
                                                    <option value="DF">Distrito Federal</option>
                                                    <option value="ES">Espírito Santo</option>
                                                    <option value="GO">Goiás</option>
                                                    <option value="MA">Maranhão</option>
                                                    <option value="MT">Mato Grosso</option>
                                                    <option value="MS">Mato Grosso do Sul</option>
                                                    <option value="MG">Minas Gerais</option>
                                                    <option value="PA">Pará</option>
                                                    <option value="PB">Paraíba</option>
                                                    <option value="PR">Paraná</option>
                                                    <option value="PE">Pernambuco</option>
                                                    <option value="PI">Piauí</option>
                                                    <option value="RJ">Rio de Janeiro</option>
                                                    <option value="RN">Rio Grande do Norte</option>
                                                    <option value="RS">Rio Grande do Sul</option>
                                                    <option value="RO">Rondônia</option>
                                                    <option value="RR">Roraima</option>
                                                    <option value="SC">Santa Catarina</option>
                                                    <option value="SE">Sergipe</option>
                                                    <option value="SP">São Paulo</option>
                                                    <option value="TO">Tocantins</option>
                                                </select>
                                                <span class="invalid-feedback">Por favor, selecione o estado.</span>
                                            </div>
                                            <div class="col-7">
                                                <label class="form-label" for="cidade">Cidade</label>
                                                <input type="text" class="form-control form-control-lg" name="cidade" id="cidade">
                                                <span class="invalid-feedback">Por favor, insira a cidade corretamente.</span>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="cnpj">CNPJ</label>
                                            <input type="text" class="form-control form-control-lg" name="cnpj" id="cnpj" data-hs-mask-options='{"mask": "00.000.000/0000-00"}'>
                                            <span class="invalid-feedback">Por favor, insira o CNPJ corretamente.</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="email">Endereço de E-mail</label>
                                    <input type="email" class="form-control form-control-lg" name="email" id="email">
                                    <span class="invalid-feedback">Por favor, insira o endereço de e-mail corretamente.</span>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label w-100" for="password" tabindex="0">Senha</label>
                                    <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                        <input type="password" class="form-control form-control-lg" name="senha" id="senha" required data-hs-toggle-password-options='{
                                            "target": "#changePassTarget",
                                            "defaultClass": "bi-eye-slash",
                                            "showClass": "bi-eye",
                                            "classChangeTarget": "#changePassIcon"
                                        }'>
                                        <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                                            <i id="changePassIcon" class="bi-eye"></i>
                                        </a>
                                    </div>
                                    
                                    <span class="invalid-feedback">Por favor, insira a senha corretamente.</span>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label w-100" for="confirmar-senha" tabindex="0">Confirmar Senha</label>
                                    <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                        <input type="password" class="js-toggle-password form-control form-control-lg" name="confsenha" id="confsenha" required data-hs-toggle-password-options='{
                                            "target": "#changePassConfirmTarget",
                                            "defaultClass": "bi-eye-slash",
                                            "showClass": "bi-eye",
                                            "classChangeTarget": "#changePassConfirmIcon"
                                        }'>
                                        <a id="changePassConfirmTarget" class="input-group-append input-group-text" href="javascript:;">
                                            <i id="changePassConfirmIcon" class="bi-eye"></i>
                                        </a>
                                    </div>
                                    <span class="invalid-feedback">As senhas estão diferentes, verifique.</span>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="../front-dashboard-v2.0/assets/js/vendor.min.js"></script>
        <script src="../front-dashboard-v2.0/assets/js/theme.min.js"></script>
        <script src="../assets/script/custom.js"></script>
    </body>
</html>