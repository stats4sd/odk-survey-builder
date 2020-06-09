#!/usr/bin/python3

import pandas as pd
import sys

path = sys.argv[1]
path_files = sys.argv[1] + '/_docs/Rhomis-v1.6-questionnaires/'
file_name = sys.argv[2]
files = sys.argv[3].split(',')
core = sys.argv[4]
title = sys.argv[5]
form_id = sys.argv[6]
language = sys.argv[7]

try:
	dfs_survey = []
	dfs_choices = []
	dfs_settings = []

	# add full core if core is true
	if core:
		core_file = 'Rhomis_core_v1.6draftv5_Nov12.xlsx'

	# add reduced core if core is false
	else:
		core_file = 'RHoMIS_Minimal_v1.6.xlsx'

	# add the core to the dataframe list
	df_survey =  pd.read_excel(path_files + core_file, sheet_name='survey')
	df_choices =  pd.read_excel(path_files + core_file, sheet_name='choices')

	dfs_survey.append(df_survey)
	dfs_choices.append(df_choices)

	# add each file to the dataframe list
	for file in files:

		df_survey =  pd.read_excel(path_files + 'Rhomis_Modules/' + file, sheet_name='survey')
		df_choices =  pd.read_excel(path_files + 'Rhomis_Modules/' + file, sheet_name='choices')

		dfs_survey.append(df_survey)
		dfs_choices.append(df_choices)

	# concatenate the dataframes to one dataframe
	survey = pd.concat(dfs_survey)
	choices = pd.concat(dfs_choices)
	settings = pd.DataFrame ({'form_title': [title], 'form_id': [form_id], 'default_language':[language], 'version':[1]}, columns = ['form_title','form_id','default_language','version'])

	dfs = {'survey':survey, 'choices':choices, 'settings':settings}
	writer = pd.ExcelWriter(path + '/storage/app/public/odk_forms/' + file_name, engine='xlsxwriter')

	# pass the dataframe to respective sheet name
	for sheet_name in dfs.keys():
		dfs[sheet_name].to_excel(writer, sheet_name=sheet_name, index=False)

	writer.save()
	writer.close()

except IndexError as error:

	print('IndexError', error)

finally:

	print('Done!')






