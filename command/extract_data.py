"""
Script simples para extrair os dados da primeira tabela da primeira página do PDF

Só precisa de duas entradas de dados:
 - O tipo de arquivo a ser exportado (CSV / JSON)
 - O nome do arquivo PDF cuja extração será feita

@author Ricardo Filho
"""

import tabula
import pandas as pd
from sys import exit

##########################################################################

print("\n******************* Extrair dados do PDF *******************")

export_format = input("\nDigite o formato da exportação: [1] CSV; [2] JSON: ")

# Validando entrada de dados
if export_format.isdigit():
    export_format = int(export_format)
else:
    exit("\n Opção inválida, tente novamente!")

if (export_format != 1 and export_format != 2):
    exit("\n Opção inválida, tente novamente!")

# Script do arquivo
file = input("\nDigite o nome do arquivo de onde os dados serão extraídos (apenas o nome, sem a extensão): ")

# Abre o arquivo e extrai o conteúdo da primeira tabela da primeira pagina
file = file + ".pdf"

# Valida o arquivo PDF
try:
    f = open(file)
    f.close()
except IOError:
    exit("\n Arquivo não existe. Verifique o nome e se está na raíz da pasta deste script!")

##########################################################################

table = tabula.read_pdf(file, pages=1)

# Atribui a tabela para o dataframe que será trabalhado para exportação
data = table[0]

#print(type(data))

"""
Operações que vamos efetuar (bem específicas deste projeto, isso pode ser feito de mais abrangente caso necessário):
- Renomear as colunas;
- Transformar os dados de data para o formato esperado pelo mysql: YYYY-MM-DD
- Converter estados e cidades para os ids que serão usados pelo sistema
- Adicionar coluna is_active com valor padrão 1
- Exportar os dados para csv
"""

#print(data.columns) # antes

# Renomear colunas
data.rename({'Nome': 'name', 'E-mail': 'email', 'Telefone': 'phone_number', 'Estado': 'state_id', 'Cidade': 'city_id', 'Data de nasc.': 'born_at'}, axis=1, inplace=True)
#print(data.columns)

# Converter o formato das datas das colunas
data['born_at'] = pd.to_datetime(data['born_at'], dayfirst=True)
#data['born_at'] = pd.to_datetime(pd.Series(data['born_at']), format='%Y%m%d')
data['born_at'] = data['born_at'].apply(lambda x: x.strftime('%Y-%m-%d'))
#print(data['born_at'])

# Alterar os valores de cidade e estado
data['state_id'] = data['state_id'].map({'Minas Gerais': 1, 'São Paulo': 2})
data['city_id'] = data['city_id'].map({'Areado': 1, 'Belo Horizonte': 2, 'Itapeva': 3, 'Araraquara': 4, 'Limeira': 5, 'Rio Claro': 6})
#print(data[['state_id', 'city_id']])

# Adicionando a coluna is_active
data['is_active'] = 1
#print(data)

if export_format == 1:
    data.to_csv('customer_data.csv')
    print("\n O formato selecionado foi CSV. O arquivo foi gerado!")
else:
    data.to_json('customer_data.json', orient='records')
    print("\n O formato selecionado foi JSON. O arquivo foi gerado!")

