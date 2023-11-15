import folium
import pandas as pd
import os

# File paths
geojson_path = os.path.join('data', 'map.geojson')
csv_path = os.path.join('data', 'forms.csv')

# Read CSV data into a Pandas DataFrame
state_data = pd.read_csv(csv_path)

# Create a Folium map
m = folium.Map(location=[14.8143, 121.0725], zoom_start=13)

# Add Choropleth layer
choropleth = folium.Choropleth(
    geo_data=geojson_path,
    name='Teenage Pregnancy Rate',
    data=state_data,
    columns=['barangay', 'teenage_pregnancy_rate'],
    key_on='feature.properties.name',
    fill_color='YlGn',
    fill_opacity=0.7,
    line_opacity=0.2,
    legend_name='Teenage Pregnancy Cases'
).add_to(m)

geojson_layer = folium.GeoJson(
    geojson_path,
    zoom_on_click=True,
    style_function=lambda feature: {
        "color": "black",
        "weight": 2,
        "opacity": 0.5,
    },
    highlight_function=lambda feature: {
        "fillColor": "white",
    },
    ).add_to(m)

folium.LayerControl(collapsed=True).add_to(m)
# Save the map as an HTML file
m.save('map.html')
