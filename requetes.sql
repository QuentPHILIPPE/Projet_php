

//Liste des morceaux dun album\\

SELECT Art.nomArtiste, M.nomMorceau, M.dureeChanson, A.nomAlbum
FROM Morceaux M, Album A, Artiste Art
WHERE A.idAlbum = x AND A.artiste = Art.idArtiste

//Liste des albums dun artiste\\

SELECT A.nomAlbum, A.dateSortie, A.note
FROM Album A, Artiste Art
WHERE Art.idArtiste = x

//Liste des utilisateurs non valides par ladmin

SELECT U.adresseMail, U.pseudo
FROM User U
WHERE U.statut = false

//Liste des artiste\\

SELECT Art.nomArtiste
FROM Artiste Art

//Liste des albums\\

SELECT A.nomAlbum
FROM Album A

//