import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from "@ngrx/effects";
import { catchError, map, switchMap } from "rxjs/operators";
import { EMPTY } from "rxjs";

import { KeywordApiService } from "src/app/api";
import * as actions from "./keyword.actions";

@Injectable()
export class KeywordEffects {
    constructor(private actions$: Actions,
                private api: KeywordApiService
    ) {
    }

    loadKeyword$ = createEffect(
        () => this.actions$.pipe(ofType(actions.load), switchMap(() =>
                this.api.getKeywords().pipe(
                    map(actions.loadSuccess),
                    catchError(() => EMPTY)
                )
            )
        )
    );

}
