create database sisclinica;
use sisclinica;

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('masculino','feminino') NOT NULL,
  `estadocivil` enum('solteiro','casado','divorciado','viuvo','separado','uniao-estavel','companheiro') NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `convenio` enum('sim','nao') NOT NULL,
  `condicoesmedicas` text DEFAULT NULL,
  `medicacoes` text DEFAULT NULL,
  `historico` text DEFAULT NULL,
  `alergias` text DEFAULT NULL,
  `emergencia` text DEFAULT NULL,
  `tiposanguineo` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `convenio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `crm` int(11) DEFAULT NULL,
  `especialidade` varchar(200) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `consultorio` varchar(50) DEFAULT NULL,
  `dias_atendimento` enum('segunda','terca','quarta','quinta','sexta','sabado') DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `consultorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `horarios_atendimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medico_id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `medico_id` (`medico_id`),
  CONSTRAINT `horarios_atendimento_ibfk_1` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`)
) ;

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `procedimento` varchar(255) NOT NULL,
  `status` enum('agendada','confirmada','finalizada','remarcada','cancelada') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_medico` (`id_medico`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`),
  CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`)
) ;





