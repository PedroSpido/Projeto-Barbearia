<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($name, $email, $password, $telefone_1 = null, $estado = null, $bairro = null, $rua = null, $numero = null, $complemento = null, $cep = null, $cpf = null) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("INSERT INTO Clientes (Nome, email, password, telefone_1, estado, bairro, rua, numero, complemento, CEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $hashPassword, $telefone_1, $estado, $bairro, $rua, $numero, $complemento, $cep]);
            $cod_cliente = $this->pdo->lastInsertId();

            if ($cpf) {
                $stmt = $this->pdo->prepare("INSERT INTO Pessoa_Fisica (cod_cliente, cpf) VALUES (?, ?)");
                $stmt->execute([$cod_cliente, $cpf]);
            }

            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            echo "Erro durante o registro: " . $e->getMessage();
            return false;
        }
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM Clientes WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
