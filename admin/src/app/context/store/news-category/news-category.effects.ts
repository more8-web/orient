import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from "@ngrx/effects";
import { catchError, map, switchMap } from "rxjs/operators";
import { EMPTY } from "rxjs";

import { NewsCategoryApiService } from "src/app/api";
import { newsCategoryActions as actions } from "./news-category.actions";

@Injectable()
export class NewsCategoryEffects {
    constructor(private actions$: Actions,
                private api: NewsCategoryApiService
    ) {
    }

    loadNewsCategories$ = createEffect(
        () => this.actions$.pipe(ofType(actions.load), switchMap(() =>
                this.api.getNewsCategories().pipe(
                    map(actions.loadSuccess),
                    catchError(() => EMPTY)
                )
            )
        )
    );

}
