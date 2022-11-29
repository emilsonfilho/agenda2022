<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">

  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Cadastro e Leitura de Contatos -->
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar Perfil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" id="formulario">
              <div class="card-body">
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite Seu Nome">
                </div>
                <div class="form-group">
                  <label for="email">Endereço de E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Digite Seu E-mail">
                </div>
                <div class="form-group">
                  <label for="fone">Telefone</label>
                  <input type="password" class="form-control" id="fone" name="fone" placeholder="Digite o Telefone Para Contato">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto de Perfil</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="avatar">
                      <label class="custom-file-label" for="avatar">Selecione O Arquivo</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Editar Perfil</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dados do Contato</h3>
            </div>
            <!-- /.card-header -->
            
            
                  <div class="card-body p-0" style="text-align: center; margin-bottom: 98px">
                    <img src="../img/user/" alt="" style="margin-top: 18px; width: 200px; height: 200px; border-radius: 50%;">
                    <h2>xXx</h2>
                    <h5><strong>(85) *********</strong></h5>
                    <p>email@gmail.com</p>
                  </div>
            
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- Fim (Cadastro e Leitura de Contatos) -->
    </div>
  </section>
</div>