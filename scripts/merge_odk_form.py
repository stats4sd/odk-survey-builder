#!/usr/bin/python3

import pandas as pd
import sys
files = sys.argv[3]
print(files)
# try:
excel1 = 'C:/Users/LuciaFalcinelli/Documents/GitHub/odk-survey-builder/scripts/Module-Agroforestry.xlsx'
excel2 = 'C:/Users/LuciaFalcinelli/Documents/GitHub/odk-survey-builder/scripts/Module-Bushmeat.xlsx'
df1_survey =  pd.read_excel(excel1, sheet_name='survey')
df1_choices =  pd.read_excel(excel1, sheet_name='choices')
df1_settings =  pd.read_excel(excel1, sheet_name='settings')
df2_survey =  pd.read_excel(excel2, sheet_name='survey')
df2_choices =  pd.read_excel(excel2, sheet_name='choices')
df2_settings =  pd.read_excel(excel2, sheet_name='settings')
	
df_survey = [df1_survey, df2_survey]
df_choices = [df1_choices, df2_choices]
df_settings = [df1_settings, df2_settings]


survey = pd.concat(df_survey)
choices = pd.concat(df_choices)
settings = pd.concat(df_settings)

dfs = {'survey':survey, 'choices':choices, 'settings':settings}
writer = pd.ExcelWriter('output.xlsx', engine='xlsxwriter')
for sheet_name in dfs.keys():
	dfs[sheet_name].to_excel(writer, sheet_name=sheet_name, index=True)

writer.save()
writer.close()




