import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from "@ngrx/effects";
import { catchError, map, switchMap } from "rxjs/operators";
import { EMPTY } from "rxjs";

import { NewsApiService } from "src/app/api";
import { newsActions as actions } from "./news.actions";

@Injectable()
export class NewsEffects {
    constructor(private actions$: Actions,
                private api: NewsApiService
    ) {
    }

    loadNews$ = createEffect(
        () => this.actions$.pipe(ofType(actions.load), switchMap(() =>
                this.api.getNews().pipe(
                    map(actions.loadSuccess),
                    catchError(() => EMPTY)
                )
            )
        )
    );

}
