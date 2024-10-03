from rest_framework.decorators import api_view
from rest_framework.response import Response
import joblib
import numpy as np

# Load the trained model
model = joblib.load('recommendation/models/financial_product_recommendation_model.pkl')

@api_view(['POST'])
def recommend_product(request):
    try:
        # Get the demographic data from the POST request
        data = request.data
        demographics = [
            data['female_ratio'],
            data['senior_ratio'],
            data['youth_ratio'],
            data['average_income'],
            data['farming_activity']
        ]

        # Convert the input to a NumPy array for model prediction
        demographics_array = np.array([demographics])

        # Make a prediction using the loaded model
        prediction = model.predict(demographics_array)

        # Return the prediction as a JSON response
        return Response({'recommended_product': int(prediction[0])})

    except Exception as e:
        return Response({'error': str(e)}, status=400)
