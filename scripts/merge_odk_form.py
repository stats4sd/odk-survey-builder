#!/usr/bin/python3

import pandas as pd
import sys
path = sys.argv[1]
path_files = sys.argv[1] + '/_docs/Rhomis-v1.6-questionnaires/'
file_name = sys.argv[2]
files = sys.argv[3].split(',') 

# try:
dfs_survey = []
dfs_choices = []
dfs_settings = []

# add core
df_survey =  pd.read_excel(path_files + 'Rhomis_core_v1.6draftv5_Nov12.xlsx', sheet_name='survey')
df_choices =  pd.read_excel(path_files + 'Rhomis_core_v1.6draftv5_Nov12.xlsx', sheet_name='choices')
df_settings =  pd.read_excel(path_files + 'Rhomis_core_v1.6draftv5_Nov12.xlsx', sheet_name='settings')

dfs_survey.append(df_survey)
dfs_choices.append(df_choices)
dfs_settings.append(df_settings)


for file in files:

	df_survey =  pd.read_excel(path_files + 'Rhomis_Modules/' + file, sheet_name='survey')
	df_choices =  pd.read_excel(path_files + 'Rhomis_Modules/' + file, sheet_name='choices')
	df_settings =  pd.read_excel(path_files + 'Rhomis_Modules/' + file, sheet_name='settings')
	dfs_survey.append(df_survey)
	dfs_choices.append(df_choices)
	dfs_settings.append(df_settings)

survey = pd.concat(dfs_survey)
choices = pd.concat(dfs_choices)
settings = pd.concat(dfs_settings)

dfs = {'survey':survey, 'choices':choices, 'settings':settings}
writer = pd.ExcelWriter(path + '/storage/app/public/odk_forms/' + file_name, engine='xlsxwriter')
for sheet_name in dfs.keys():
	dfs[sheet_name].to_excel(writer, sheet_name=sheet_name, index=False)

writer.save()
writer.close()




