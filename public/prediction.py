# train models
from sklearn.svm import SVR
import numpy as np
from pymongo import MongoClient

client = MongoClient('localhost', 27017)
db = client.mhaf_iot
dataGroup = db.data_values
Y1 = list();
X1 = list();
labels = list();
tt = dataGroup.find()
label = -1;
for doc in tt:
	if(doc['data_id'] == '5b0b56467235e6283c005279'):
		label +=1
		labels.append(label)
		X1.append(float(doc['value']));
		Y1.append(label)


Y_longer = list()
longeur = len(Y1)*2
for j in range(1,longeur):
	Y_longer.append(j)



clf_1 = SVR(kernel='poly', C=1e3, degree=1)
clf_2 = SVR(kernel='poly', C=1e3, degree=2)

clf_1.fit(np.array(Y1).reshape(-1, 1), X1)
clf_2.fit(np.array(Y1).reshape(-1, 1), X1)

#%matplotlib inline
import matplotlib as mpl
import matplotlib.pyplot as plt

# plot real data
plt.plot(Y1, X1, linewidth=8.0, label='true data')

predicted_1_y = []
predicted_2_y = []

# predict data points based on models
for i in Y_longer:
    predicted_1_y.append(clf_1.predict(np.array([i]).reshape(-1, 1)))
    predicted_2_y.append(clf_2.predict(np.array([i]).reshape(-1, 1)))

# plot model predictions
plt.plot(Y_longer, predicted_1_y, linewidth=6.0, ls=":", label='model, degree 1')
plt.plot(Y_longer, predicted_2_y, linewidth=6.0, ls=":", label='model, degree 2')

plt.legend(loc='upper left')
plt.show()
