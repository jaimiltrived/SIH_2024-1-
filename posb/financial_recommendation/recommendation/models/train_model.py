import pandas as pd
import numpy as np
from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
import joblib

# Step 1: Create sample demographic data
data = {
    'female_ratio': [0.45, 0.55, 0.60, 0.30, 0.40],
    'senior_ratio': [0.10, 0.20, 0.15, 0.30, 0.25],
    'youth_ratio': [0.15, 0.20, 0.18, 0.22, 0.25],
    'average_income': [50000, 45000, 52000, 40000, 48000],
    'farming_activity': [1, 0, 1, 0, 1],  # 1 for farming activity, 0 for no farming activity
    'recommended_product': [0, 1, 0, 1, 2]  # Target variable: 0 for SSA, 1 for SCSS, 2 for PPF
}

# Convert data to a pandas DataFrame
df = pd.DataFrame(data)

# Step 2: Split data into features (X) and target (y)
X = df[['female_ratio', 'senior_ratio', 'youth_ratio', 'average_income', 'farming_activity']]
y = df['recommended_product']

# Step 3: Split into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Step 4: Train the RandomForestClassifier
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

# Step 5: Test the model
y_pred = model.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)
print(f"Model Accuracy: {accuracy * 100:.2f}%")

# Step 6: Save the trained model to a .pkl file
joblib.dump(model, 'financial_product_recommendation_model.pkl')
print("Model saved as financial_product_recommendation_model.pkl")
