
<?php
include "../../seguranca.php";
protegePagina();
?>

<html>
       
    <head>
        <?php

        $msg[0] = "Conexão com o banco falhou!";
        $msg[1] = "Não foi possível selecionar o banco de dados!";


        $conexao = mysql_pconnect("localhost:3306","root") or die($msg[0]);
        mysql_select_db("siteanuncio",$conexao) or die($msg[1]);
        
        $nusuario = addslashes($_SESSION['usuarioLogin']);

        $query = "SELECT loginUsuario,senhaUsuario,nomeUsuario,cpfUsuario,loginUsuario,telefoneUsuario,telComUsuario,celularUsuario,ruaEndUsuario,numeroEndUsuario,bairroUsuario,complementoEndUsuario,CEPEndUsuario FROM usuario WHERE loginUsuario='$nusuario' LIMIT 1";
        $resultado = mysql_query($query,$conexao);
        $linha = mysql_fetch_array($resultado);
        
                       
        $nome=$linha['nomeUsuario'];
        $cpf=$linha['cpfUsuario'];
        $endereco=$linha['ruaEndUsuario'];
        $numero=$linha['numeroEndUsuario'];
        $cep=$linha['CEPEndUsuario'];
        $bairro=$linha['bairroUsuario'];
        $complemento=$linha['complementoEndUsuario'];
        $email=$linha['loginUsuario'];
        $telefone=$linha['telefoneUsuario'];
        $telCome=$linha['telComUsuario'];
        $cel=$linha['celularUsuario'];
        
                
        
        ?>
        
        <script type="text/javascript">
    $('#txCPF').mask('999.999.999-99');
    $('#txTelefone').mask('(99)9999-9999');
    $('#txTelComercial').mask('(99)9999-9999');
    $('#txCel').mask('(99)9999-9999');
    $('#txCEP').mask('99999-999');
</script>
    </head>
    <body>
        <div id="tabelaLogin">
            <form id="cadUsuario" name="cadUsuario" action="menu_superior/usuario/dados_usuario_gravar.php" method="post" >        
                <table align="center" border="0" style=" -moz-border-radius:8px; width: 600px;margin-top: 40px;">        
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="89px">
                                        Nome:<font color="#FF0000"><b>*</b></font>
                                    </td>
                                    <td>
                                        <input type="text" id="txNome" name="txNome" value="<?php echo $nome;   ?>" size="50" maxlength="50" />
                                    </td>
                                    <td width="42px">
                                        CPF:<font color="#FF0000"><b>*</b></font>
                                    </td>
                                    <td>
                                        <input type="text" id="txCPF" name="txCPF" value="<?php echo  $cpf;  ?>" size="15" maxlength="14" />
                                    </td>
                                </tr>
                            </table>                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="90px">
                                        Endereco:
                                    </td>
                                    <td>
                                        <input type="text" id="txEndereco" name="txEndereco" size="78" maxlength="75" value="<?php echo  $endereco;  ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>                
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="90px">
                                        Bairro:
                                    </td>
                                    <td>
                                        <input type="text" id="txBairro" name="txBairro" size="55" maxlength="55" value="<?php echo $bairro;   ?>"/>
                                    </td>
                                    <td align="right" width="43px">
                                        CEP:
                                    </td>
                                    <td>
                                        <input type="text" id="txCEP" name="txCEP" size="10" maxlength="9" value="<?php echo  $cep;  ?>"/> 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>                
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="90px">
                                        Complemento:
                                    </td>
                                    <td>
                                        <input type="text" id="txComplemento" name="txComplemento" size="50" maxlength="50" value="<?php echo  $complemento;  ?>"/> 
                                    </td>
                                    <td align="right" width="73px">
                                        Numero:
                                    </td>
                                    <td>
                                        <input type="text" id="txNumero" name="txNumero" size="10" maxlength="10" value="<?php echo  $numero;  ?>"/> 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>                
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="90px">
                                        E-mail:<font color="#FF0000"><b>*</b></font>
                                    </td>
                                    <td>
                                        <input type="text" id="txEmail" name="txEmail" size="60" maxlength="50" readonly value="<?php echo  $email;  ?>  "/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="90px">
                                        Telefone:<font color="#FF0000"><b>*</b></font>
                                    </td>
                                    <td>
                                        <input type="text" id="txTelefone" name="txTelefone" value="<?php echo $telefone;   ?>" size="14" maxlength="13" />
                                    </td>
                                    <td align="right" width="106px">
                                        Tel.Comercial:
                                    </td>
                                    <td>
                                        <input type="text" id="txTelComercial" name="txTelComercial" value="<?php echo $telCome;   ?>" size="14" maxlength="13" />
                                    </td>
                                    <td align="right" width="40">
                                        Cel:
                                    </td>
                                    <td>
                                        <input type="text" id="txCel" name="txCel" value="<?php echo  $cel;  ?>" size="14" maxlength="13" />
                                    </td>
                                </tr>
                            </table>                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="90px">
                                        Senha:<font color="#FF0000"><b>*</b></font>
                                    </td>
                                    <td>
                                        <input type="password" id="pwSenha" name="pwSenha" size="25" maxlength="15"/> 
                                    </td>
                                    <td width="132px" align="right">
                                        Confirme a Senha:<font color="#FF0000"><b>*</b></font>
                                    </td>
                                    <td>
                                        <input type="password" id="pwSenhaConf" name="pwSenhaConf" size="25" maxlength="15"/> 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="margin-top: 30px" align="center">
                                <tr>
                                    <td align="right">
                                      <input border="0" src="../classificados-final/imagens/btn_salvar.png" name="submit" width="85" height="30" type="image" href="#" onClick="if (fn_VerificaForm('cadUsuario')) return true; else return false;">
                                     </input>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="cadUsuario" name="cadUsuario">
        </div>
    </body>
</html>
