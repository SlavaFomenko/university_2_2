# -*- coding: utf-8 -*-
"""Фоменко Лаб 2 ВТ-22-2 .ipynb

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/1D34HfyHHOc2rBHXv_5hAYz_mozgcDnin
"""



import pandas as pd
import numpy as np
import plotly.graph_objects as go

from sklearn.preprocessing import MinMaxScaler

data = {
  'temperature' : np.random.uniform(low = 50, high = 100,size=(1,100)).flatten(),
  'numidity': np.random.uniform(low = 20, high = 70,size=(1,100)).flatten(),
  'pressure': np.random.uniform(low = 400, high = 800,size=(1,100)).flatten(),
  'speed': np.random.uniform(low = 1000, high = 4000,size=(1,100)).flatten(),
}

df = pd.DataFrame(data)

# df

fig_before = go.Figure();

for col in df.columns:
  fig_before.add_trace(go.Scatter(x=df.index, y=df[col], mode='lines', name=col))

fig_before.update_layout(title='Data Before Normalization',
                         xaxis_title='Index',
                         yaxis_title='Value')
fig_before.show()

scaler = MinMaxScaler()


df = pd.DataFrame(scaler.fit_transform(df), columns=df.columns)

fig_normalized = go.Figure()

for col in df.columns:
    fig_normalized.add_trace(go.Scatter(x=df.index, y=df[col], mode='lines', name=col))

fig_normalized.update_layout(title='Data after Normalization',
                             xaxis_title='Index',
                             yaxis_title='Value')

fig_normalized.show()

import plotly.graph_objects as go
import numpy as np

data1 = np.random.normal(loc=50, scale=20, size=1000)
data2 = np.random.normal(loc=60, scale=15, size=1000)

data1_clipped = np.clip(data1, 0, 100)
data2_clipped = np.clip(data2, 0, 100)

fig1 = go.Figure()
fig1.add_trace(go.Histogram(x=data1_clipped, name='Distribution 1'))

fig1.update_layout(
    title='1',
    xaxis_title='value',
    yaxis_title='den'
)

fig2 = go.Figure()
fig2.add_trace(go.Histogram(x=data2_clipped, name='Distribution 2'))

fig2.update_layout(
    title='2',
    xaxis_title='value',
    yaxis_title='den'
)

fig1.show()
fig2.show()

from sklearn.preprocessing import StandardScaler

scaler = StandardScaler()

data1_standardized = scaler.fit_transform(data1_clipped.reshape(-1, 1)).flatten()
data2_standardized = scaler.fit_transform(data2_clipped.reshape(-1, 1)).flatten()

fig2 = go.Figure()
fig2.add_trace(go.Histogram(x=data1_standardized, name='Standardized Distribution 1'))

fig2.update_layout(
    title='1',
    xaxis_title='value',
    yaxis_title='den'
)

fig4 = go.Figure()
fig4.add_trace(go.Histogram(x=data2_standardized, name='Standardized Distribution 2'))


fig4.update_layout(
    title='2',
    xaxis_title='value',
    yaxis_title='den'
)


fig2.show()
fig4.show()

import numpy as np
from sklearn.model_selection import train_test_split
import tensorflow as tf
from tensorflow.keras import layers, models

df = pd.read_csv('alarms_no_scaled.csv')
# df

X = df[['sound','distance','visibility']].values
y = df[['alarm']]

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)

model = models.Sequential([
  layers.Dense(1,input_shape=(X_train.shape[1],) , activation='sigmoid')
])
model.compile(optimizer='adam',loss='mean_squared_error', metrics=['mse'])

model.fit(X_train, y_train, epochs=50, batch_size=32, validation_data=(X_test, y_test))
loss, accuracy = model.evaluate(X_test, y_test)
print ("Test Loss:", loss)
print("Test Accuracy:", accuracy)

df = pd.read_csv('alarms_no_scaled.csv')

X = df[['sound', 'distance', 'visibility']].values
y = df[['alarm']].values

scaler = MinMaxScaler()
X = scaler.fit_transform(X)


X


# X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)

# model = models.Sequential([
#     # layers.Dense(32, input_shape=(X_train.shape[1],), activation='relu'),
#     # layers.Dense(16, activation='relu'),
#   layers.Dense(1,input_shape=(X_train.shape[1],) , activation='sigmoid'),
# ])
# model.compile(optimizer='adam',loss='mean_squared_error', metrics=['mse'])

# model.fit(X_train, y_train, epochs=50, batch_size=32, validation_data=(X_test, y_test))
# loss, accuracy = model.evaluate(X_test, y_test)
# print ("Test Loss:", loss)
# print("Test Accuracy:", accuracy)

new_data = np.array([
[0.7,0.1,0.71],
[0.3,0.7,0.31],
[0.9,0.5,0.3],
[0.6,0.5,0.71],
[0.9,0.1,0.91],
])
predictions = model.predict(new_data)
print("Predictions:")
print(predictions)