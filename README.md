# RDF and discrete global grid systems

Notes on discrete global grid systems, identifiers, and RDF.

One way to handle geospatial data in RDF is to bin point data into cells of a discrete global grid system (DGGS), and have unique identifiers for each cell in the grid. For example, Adams (2016) describes Wāhi which has URLs like http://dg3.cer.auckland.ac.nz/isea3h/11.25_58.2825/7/cell/1001 (server doesn’t seem to be working right now). Mocnik (2018) proposes a different identifier scheme that encodes cell coordinates in the identifier, which then helps displaying the cells (given the identifier we can retrieve the cell).

## DGGS

SNYDER, J. P. (1992). An Equal-Area Map Projection For Polyhedral Globes. Cartographica: The International Journal for Geographic Information and Geovisualization, 29(1), 10–21. [doi:10.3138/27h7-8k88-4882-1752](https://doi.org/10.3138/27h7-8k88-4882-1752)

Sahr, K., White, D., & Kimerling, A. J. (2003). Geodesic Discrete Global Grid Systems. Cartography and Geographic Information Science, 30(2), 121–134. [doi:10.1559/152304003100011090](https://doi.org/10.1559/152304003100011090)

SNYDER, J. P. (1992). An Equal-Area Map Projection For Polyhedral Globes. Cartographica: The International Journal for Geographic Information and Geovisualization, 29(1), 10–21. [doi:10.3138/27h7-8k88-4882-1752](https://doi.org/10.3138/27h7-8k88-4882-1752)

## Code

[DGGRID](https://discreteglobalgrids.org/software/)

![isea3h5](https://github.com/rdmpage/rdf-discrete-global-grid-systems/raw/master/images/grid.png)

[dggridR: Discrete Global Grids](https://CRAN.R-project.org/package=dggridR)

[Geoscience Australia rHealPIX version of DGGS](https://github.com/GeoscienceAustralia/AusPIX_DGGS)

[H3: A Hexagonal Hierarchical Geospatial Indexing System](https://github.com/uber/h3)


## Identifiers

Mocnik, F.-B. (2018). A novel identifier scheme for the ISEA Aperture 3 Hexagon Discrete Global Grid System. Cartography and Geographic Information Science, 1–15. [doi:10.1080/15230406.2018.1455157](https://doi.oprg/doi:10.1080/15230406.2018.1455157)

Adams, B. (2016). Wāhi, a discrete global grid gazetteer built using linked open data. International Journal of Digital Earth, 10(5), 490–503. [doi:10.1080/17538947.2016.1229819](https://doi.org/10.1080/17538947.2016.1229819)

## Applications

### Frankenplace

Searching Wikipedia geographically http://www.frankenplace.com

Adams, B., McKenzie, G., & Gahegan, M. (2015). Frankenplace. Proceedings of the 24th International Conference on World Wide Web - WWW  ’15. [doi:10.1145/2736277.2741137](https://doi.org/10.1145/2736277.2741137)

### Wāhi, a discrete global grid gazetteer built using linked open data

Adams, B. (2016). Wāhi, a discrete global grid gazetteer built using linked open data. International Journal of Digital Earth, 10(5), 490–503. [doi:10.1080/17538947.2016.1229819](https://doi.org/10.1080/17538947.2016.1229819)

### Leaflet plugin for Visualizing Discrete Global Grid Systems

[geogrid.js](https://github.com/giscience/geogrid.js)

![Overview](https://github.com/rdmpage/rdf-discrete-global-grid-systems/raw/master/images/screenshot.jpg)





