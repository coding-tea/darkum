@extends("pages.landing_page.helpLayout")

@section("links")
  @parent
  <link rel="stylesheet" href="{{asset("css/landing_page/contact.css")}}">
@endsection

@section("card-text")
  <h1>
    Avez-vous des questions ?
  </h1>
  <div>
    <p>
      Complétez le formulaire, notre équipe répondra à toutes vos questions. 
    </p>
    <p>
      Vous pouvez <b>nous appeler au <span style="color:#FF6600">+212 00000000</span></b> pour toute <b>information supplémentaire.</b>
    </p>

    <div class="contact">
      <form action="" class="form-contact">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="nom" placeholder="Nom *">
            </div>
            <div class="col">
              <select name="objet" class="form-control">
                <option value="objet">objet *</option>
                <option value="objet">Publier Une Annonce</option>
                <option value="objet">Modifier|Supprimer Une annonce</option>
                <option value="objet">Réclamation | Vous êtes un particulier</option>
                <option value="objet">Réclamation | Vous êtes un professionnel</option>
                <option value="objet">Autres</option>
              </select>
            </div>
          </div>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control mb-3" name="email" placeholder="Email *">
            <input type="tel" class="form-control" name="tel" placeholder="Téléphone *">
          </div>
          <div class="col">
            <textarea id="textarea" class="form-control" name="message" placeholder="Votre Message ... *" rows="4">
            </textarea>
          </div>
        </div>
        <button class="btn btn-primary" id="btn-contact">Envoyer</button>
      </form>
    </div>
  </div>

@endsection